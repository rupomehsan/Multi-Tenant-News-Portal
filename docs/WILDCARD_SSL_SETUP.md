# Wildcard SSL Setup — Cloudflare + Let's Encrypt

This document describes how to obtain and install a Let's Encrypt wildcard certificate for `news-saas.techparkit.info` and `*.news-saas.techparkit.info` using Cloudflare DNS validation, configure NGINX to use it, and finalize Cloudflare settings so tenant subdomains work securely.

---

## Overview

-   Goal: Secure the main domain and all tenant subdomains with HTTPS using a wildcard certificate.
-   Tools: Certbot (with `dns-cloudflare` plugin), Cloudflare DNS, NGINX.
-   Outcome: `https://news-saas.techparkit.info` and `https://*.news-saas.techparkit.info` serve valid certificates, NGINX configured, Cloudflare set to `Full (strict)`.

---

## Prerequisites

-   Root or sudo access to the server (NGINX + Certbot install access).
-   Domain managed in Cloudflare: `news-saas.techparkit.info`.
-   Cloudflare API token with permissions: `Zone:DNS:Edit` and `Zone:Zone:Read` for the zone.
-   Certbot and `python3-certbot-dns-cloudflare` installed on the server.

---

## Steps

### 1) Add required DNS records in Cloudflare

-   Create an `A` record for the apex:

    -   Name: `news-saas.techparkit.info`
    -   Type: `A`
    -   Value: `161.248.201.157` (your server IP)
    -   Proxy status: ON (orange cloud) — if you want Cloudflare proxying.

-   Create a wildcard `A` record:

    -   Name: `*.news-saas.techparkit.info`
    -   Type: `A`
    -   Value: `161.248.201.157`
    -   Proxy status: ON (orange cloud)

Note: Proxying with Cloudflare is fine — we'll use DNS validation with the API token.

### 2) Create a Cloudflare API token

1. Login to Cloudflare: https://dash.cloudflare.com
2. Profile → API Tokens → Create Token
3. Use template `Edit zone DNS` or custom:
    - Permissions: `Zone:DNS:Edit`, `Zone:Zone:Read`
    - Zone Resources: Select `news-saas.techparkit.info` (specific zone)
4. Create token and copy it; store it safely. You will not be able to view it again in Cloudflare.

### 3) Install Certbot & Cloudflare plugin (if not installed)

On Ubuntu (as root):

```bash
apt update
apt install -y certbot python3-certbot-dns-cloudflare
```

Verify plugin available:

```bash
certbot plugins | grep cloudflare
```

### 4) Store Cloudflare credentials on server

Create a credentials file readable only by root:

```bash
mkdir -p /root/.secrets
cat > /root/.secrets/cloudflare.ini <<'EOF'
# Cloudflare API token
# Replace with your token
dns_cloudflare_api_token = <YOUR_CLOUDFLARE_API_TOKEN>
EOF
chmod 600 /root/.secrets/cloudflare.ini
```

Replace `<YOUR_CLOUDFLARE_API_TOKEN>` with the token you generated.

### 5) Request wildcard certificate (Let’s Encrypt)

Run certbot with the Cloudflare DNS plugin:

```bash
certbot certonly \
  --dns-cloudflare \
  --dns-cloudflare-credentials /root/.secrets/cloudflare.ini \
  --dns-cloudflare-propagation-seconds 30 \
  -d news-saas.techparkit.info \
  -d '*.news-saas.techparkit.info' \
  --non-interactive \
  --agree-tos \
  --email admin@news-saas.techparkit.info
```

Certbot should respond with the saved certificate path (e.g., `/etc/letsencrypt/live/news-saas.techparkit.info/fullchain.pem`).

### 6) Configure NGINX to use the certificate

Example NGINX configuration for the main domain and wildcard subdomains.

Main domain (`/www/server/panel/vhost/nginx/news-saas.techparkit.info.conf`):

```nginx
server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name news-saas.techparkit.info;

    root /www/wwwroot/news-saas.techparkit.info/public;
    index index.php index.html;

    ssl_certificate /etc/letsencrypt/live/news-saas.techparkit.info/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/news-saas.techparkit.info/privkey.pem;
    ssl_protocols TLSv1.2 TLSv1.3;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/tmp/php-cgi-84.sock; # adjust per your PHP-FPM socket
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}

# HTTP block: serve plain HTTP (Cloudflare will handle redirect to HTTPS)
server {
    listen 80;
    server_name news-saas.techparkit.info;
    root /www/wwwroot/news-saas.techparkit.info/public;
    location / { try_files $uri $uri/ /index.php?$query_string; }
}
```

Wildcard (`/www/server/panel/vhost/nginx/wildcard.news-saas.techparkit.info.conf`):

```nginx
server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name *.news-saas.techparkit.info;

    root /www/wwwroot/news-saas.techparkit.info/public;
    index index.php index.html;

    ssl_certificate /etc/letsencrypt/live/news-saas.techparkit.info/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/news-saas.techparkit.info/privkey.pem;
    ssl_protocols TLSv1.2 TLSv1.3;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ { fastcgi_pass unix:/tmp/php-cgi-84.sock; include fastcgi_params; fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; }
}

server {
    listen 80;
    server_name *.news-saas.techparkit.info;
    root /www/wwwroot/news-saas.techparkit.info/public;
    location / { try_files $uri $uri/ /index.php?$query_string; }
}
```

After editing config files:

```bash
# test and reload
nginx -t
systemctl reload nginx   # or use your control script: /etc/init.d/nginx reload
```

### 7) Configure Cloudflare SSL settings

In Cloudflare dashboard for the zone:

-   SSL/TLS → Overview: set **SSL/TLS encryption mode** to **Full (strict)**
-   SSL/TLS → Edge Certificates:
    -   Enable **Always Use HTTPS** (optional)
    -   Minimum TLS Version: `TLS 1.2`

> Note: Full (strict) ensures Cloudflare validates your origin certificate (the cert we created).

### 8) Purge Cloudflare cache & verify

-   Cloudflare → Caching → Configuration → **Purge Everything**
-   Wait 2–5 minutes for propagation
-   Clear browser cache or use an incognito window

Verify from your workstation:

```bash
# Check certificate via Cloudflare (public) — may initially fail while propagating
curl -I https://news-saas.techparkit.info
curl -I https://somoy.news-saas.techparkit.info

# Test origin directly (bypassing Cloudflare) to ensure server is correct:
curl -Ik --resolve somoy.news-saas.techparkit.info:443:161.248.201.157 https://somoy.news-saas.techparkit.info
```

### 9) Renewals

Certbot sets up automatic renewal (systemd timer or cron). Verify with:

```bash
certbot renew --dry-run
```

If renewing via DNS plugin, make sure the credentials file `/root/.secrets/cloudflare.ini` remains valid and accessible to root.

---

## Troubleshooting

-   `ERR_SSL_VERSION_OR_CIPHER_MISMATCH` or `ssl3 alert handshake failure`:

    -   Ensure Cloudflare SSL mode is set to **Full (strict)** and Cloudflare has finished propagating.
    -   Purge Cloudflare cache and wait a few minutes.
    -   Verify origin certificate covers the requested subdomain (SAN includes `*.news-saas.techparkit.info`).

-   Redirect loops (`ERR_TOO_MANY_REDIRECTS`):

    -   If Cloudflare is set to enforce HTTPS and NGINX also redirects HTTP to HTTPS, avoid double redirects by letting Cloudflare handle the redirect or remove NGINX-level forced redirects. The safe config is to have NGINX listen on both ports and let Cloudflare redirect (or vice versa), but ensure only one redirect is active.

-   Certbot DNS propagation issues:

    -   Increase `--dns-cloudflare-propagation-seconds` to a higher value if needed (e.g., 60–120s) depending on DNS TTL.

-   Cloudflare Universal SSL conflict:
    -   If Cloudflare previously provisioned a Universal certificate, switching to `Full (strict)` should be fine; if issues persist, purge cache and try toggling the setting.

---

## Verification Checklist

-   [ ] Cloudflare DNS has apex and wildcard A records to the server IP
-   [ ] Cloudflare API token created and saved at `/root/.secrets/cloudflare.ini`
-   [ ] Certbot with Cloudflare plugin installed
-   [ ] Wildcard cert present at `/etc/letsencrypt/live/news-saas.techparkit.info/`
-   [ ] NGINX uses cert file and key
-   [ ] Cloudflare SSL mode = `Full (strict)`
-   [ ] Purged Cloudflare cache and verified HTTPS works in browser

---

## Notes & Security

-   Keep the Cloudflare API token in a secure location. The `/root/.secrets/cloudflare.ini` file must be `chmod 600`.
-   Do not commit the API token or cert private keys to version control.
-   Use `certbot renew --dry-run` to test renewal and add monitoring/alerts for expiration.

---

If you want, I can also:

-   Add a small script to automate cert renewal checks and show status
-   Add a short troubleshooting script to run basic checks (curl, openssl)

File path: `docs/WILDCARD_SSL_SETUP.md`
