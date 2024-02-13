<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class RegisterControl extends Controller
{
    public function registerUser(Request $r){
        $r->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        
        $user = User::create([
            'email' => $r->email,
            'password' => bcrypt($r->password)
        ]);
        $user->assignRole("editor");
        return redirect("/login")->with('success', ("User registred successfully"));
    }
}
