<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissions extends Controller
{
    public function show(){
        $roles = Role::all();
        $permissions = Permission::all();
        $data = [
            "roles" => $roles,
            "permissions" => $permissions
        ];
        return(view("rolesPermissions", compact("data")));
    }


    public function changeRole(Request $r){
        $userId = $r->input('user_id');
        $user = User::find($userId);
        DB::table('model_has_roles')->where('model_id', $userId)->delete();
        $user->assignRole("admin");
    }
}
