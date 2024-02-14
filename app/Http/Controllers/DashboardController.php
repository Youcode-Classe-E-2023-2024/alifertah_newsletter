<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DashboardController extends Controller
{
    public function dashboard(){

        $users = User::all();
        $emails = Email::all();
        $roles = Role::all();
        $permissions = Permission::all();
        $data = [
            "users" => $users,
            "emails" => $emails,
            "roles" => $roles,
            "permissions" => $permissions
        ];
        return (view("dashboard", compact("data")));
    }
}
