<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Show the site settings page for the landlord admin.
     */
    public function site()
    {
        $settingsPath = storage_path('app/landlord_settings.json');
        $settings = [];
        if (file_exists($settingsPath)) {
            $settings = json_decode(file_get_contents($settingsPath), true) ?? [];
        }

        return view('landlord.admin.pages.settings.site-settings', compact('settings'));
    }

    /**
     * Update site settings (validate, handle logo upload, persist to JSON).
     */
    public function updateSite(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'support_email' => 'nullable|email|max:255',
            'currency' => 'nullable|string|max:10',
            'footer_text' => 'nullable|string|max:1000',
            'demo_domain' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/site-logos');
            $data['site_logo'] = Storage::url($path);
        }

        $settingsPath = storage_path('app/landlord_settings.json');
        $existing = [];
        if (file_exists($settingsPath)) {
            $existing = json_decode(file_get_contents($settingsPath), true) ?? [];
        }

        $merged = array_merge($existing, $data);

        try {
            file_put_contents($settingsPath, json_encode($merged, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to save settings: ' . $e->getMessage()])->withInput();
        }

        return back()->with('success', 'Site settings updated successfully.');
    }
}
