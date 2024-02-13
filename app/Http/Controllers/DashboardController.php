<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $users = User::all();
        $emails = Email::all();

        $data = [
            "users" => $users,
            "emails" => $emails
        ];
        return (view("dashboard", compact("data")));
    }
}
