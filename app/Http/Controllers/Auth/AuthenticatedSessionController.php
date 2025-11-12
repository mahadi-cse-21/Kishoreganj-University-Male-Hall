<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // If user is already logged in, redirect to appropriate dashboard
        if (Auth::check()) {
            return $this->redirectToRoleDashboard();
        }

        session()->regenerateToken();
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Clear any intended URL to prevent redirect issues
        session()->forget('url.intended');

        return $this->redirectToRoleDashboard();
    }

    /**
     * Redirect user based on their role
     */
    private function redirectToRoleDashboard(): RedirectResponse
    {
        $user = Auth::user();
        
        if ($user->role == 'manager') {
            return redirect()->route('manager.dashboard');
        } elseif ($user->role == 'user') {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}