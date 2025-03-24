<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function announcement()
    {
        return view('pages/announcement');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function contact()
    {
        return view('pages/contact');
    }
}
