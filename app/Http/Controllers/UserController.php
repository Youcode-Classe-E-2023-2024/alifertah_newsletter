<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * try to authenticate, in fail it stays in the same page
     */
    public function login(Request $r){
        $credentials = $r->only('email', 'password');
        $remember = $r->filled("remember");

        if(Auth::attempt($credentials, $remember)){

            $user = Auth::user();
            return redirect("/dashboard");
        }
        return redirect()->back()->withErrors([
            'login' => 'These credentials do not match our records.',
        ]);
    }
}
