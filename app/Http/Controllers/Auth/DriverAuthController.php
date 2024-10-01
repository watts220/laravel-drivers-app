<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class DriverAuthController extends Controller
{
    // Show the login form
    public function create()
    {
        return Inertia::render('Driver/Login');
    }

    // Handle login request
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('driver')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/driver/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::guard('driver')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/driver/login');
    }

    // Show the dashboard after login
    public function dashboard()
    {
        $driver = auth('driver')->user();

        $routes = $driver->routes()->with('driver')->get();

        return Inertia::render('Driver/Dashboard', [
            'driver' => $driver,
            'routes' => $routes,
        ]);
    }

}
