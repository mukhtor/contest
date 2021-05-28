<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
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
        $user = User::where(['ip' => $request->ip()])->first();
        if ( Auth::user()->role != 'admin' && (( $user && $user->id != Auth::user()->id ) || (!is_null(Auth::user()->ip) && $request->ip() != Auth::user()->ip))){
            Auth::logout();
            throw ValidationException::withMessages([
                'ip' => __('ip.conflict')
            ]);
        }

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->ip = Auth::user()->role == 'admin' ? null : $request->ip();
        $user->save();
        if($user->role == 'admin')
            return redirect('/admin');

        return redirect()->intended(RouteServiceProvider::HOME);
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

        return redirect('/');
    }
}
