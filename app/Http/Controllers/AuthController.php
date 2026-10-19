<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion unifié
     */
    public function viewlogin()
    {
        return view('admins.login');
    }

    /**
     * Traite la connexion des administrateurs
     */
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->intended(route('admins.dashboard'));
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Identifiants incorrects pour un administrateur.',
            ], 'admin');
    }

    /**
     * Traite la connexion des coiffeurs
     */
    public function coiffeurLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('Coiffeur')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->intended(route('coiffeur.dashboard'));
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Identifiants incorrects pour un coiffeur.',
            ], 'coiffeur');
    }

    /**
     * Déconnexion pour tous les guards
     */
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('Coiffeur')->check()) {
            Auth::guard('Coiffeur')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('view.login');
    }
}