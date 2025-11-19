<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function testAuth(Request $request)
    {
        $email = $request->input('email', 'admin@somoynews.com');
        $password = $request->input('password', 'admin123');

        // Check if user exists
        $user = User::where('email', $email)->first();

        $debug = [
            'tenant_id' => tenant('id'),
            'tenant_name' => tenant('name'),
            'email_searching' => $email,
            'user_found' => $user ? 'YES' : 'NO',
            'total_users' => User::count(),
            'all_users' => User::pluck('email')->toArray(),
        ];

        if ($user) {
            $debug['user_id'] = $user->id;
            $debug['user_email'] = $user->email;
            $debug['password_check'] = Hash::check($password, $user->password) ? 'SUCCESS' : 'FAILED';
            $debug['auth_attempt'] = Auth::attempt(['email' => $email, 'password' => $password]) ? 'SUCCESS' : 'FAILED';
        }

        return response()->json($debug);
    }
}
