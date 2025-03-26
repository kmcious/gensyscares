<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('pages/adminSide/admin_dashboard');
    }

    public function userDashboard()
    {
        return view('pages/userSide/user_dashboard');
    }
}