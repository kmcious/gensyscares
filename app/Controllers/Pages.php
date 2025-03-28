<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AnnouncementModel; // <-- Import the model

class Pages extends Controller
{
    public function announcement()
    {
        $announcementModel = new AnnouncementModel();
        $data['announcements'] = $announcementModel->orderBy('event_date', 'ASC')->findAll(); // Fetch sorted events

        return view('pages/announcement', $data); // Pass data to the view
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
