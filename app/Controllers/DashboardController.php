<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\SocialPostModel;
use App\Models\UserModel;
use App\Models\AnnouncementModel;

class DashboardController extends Controller
{
    protected $socialPostModel;
    protected $userModel;
    protected $announcementModel;

    public function __construct()
    {
        $this->socialPostModel = new SocialPostModel();
        $this->userModel = new UserModel();
        $this->announcementModel = new AnnouncementModel(); // Model for announcements
    }

    public function adminDashboard()
    {
        // Fetching data for the analytics section
        $totalUsers = $this->userModel->countAll(); // Total users from UserModel
        $totalAnnouncements = $this->announcementModel->countAll(); // Total announcements from AnnouncementModel

        // Pass the data to the view
        return view('pages/adminSide/admin_dashboard', [
            'totalUsers' => $totalUsers,
            'totalAnnouncements' => $totalAnnouncements,
        ]);
    }

    public function userDashboard()
    {
      // Get the posts from the database
        $data['posts'] = $this->socialPostModel
            ->join('usertable', 'social_posts.user_id = usertable.id')
            ->select('social_posts.id, social_posts.message, usertable.name as user_name, social_posts.created_at')
            ->orderBy('social_posts.created_at', 'DESC')
            ->findAll();

        // Pass the data to the view
        return view('pages/userSide/user_dashboard', $data);
    }
}
