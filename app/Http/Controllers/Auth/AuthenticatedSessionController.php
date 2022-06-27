<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *Ps
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('theme.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (auth()->user()->role === 'Student'){
            return redirect('/clearance-form');
        }
        elseif (auth()->user()->role === 'I/C Library') {
            return redirect('/ic-library-students-table');
        }
        elseif (auth()->user()->role === 'HOD') {
            return redirect('/hod-students-table');
        }
        elseif (auth()->user()->role === 'Research Cell') {
            return redirect('/research-cell-students-table');
        }
        elseif (auth()->user()->role === 'I/C Progress') {
            return redirect('/ic-progress-students-table');
        }
        elseif (auth()->user()->role === 'Accounts') {
            return redirect('/accounts-students-table');
        }
        else {
            return redirect('/theme-login');
        }

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/theme-login');
    }
}
