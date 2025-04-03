<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\SocialPostModel;
use App\Models\UserModel;

class DashboardController extends Controller
{

    protected $socialPostModel;
    protected $userModel;

    public function __construct()
    {
        $this->socialPostModel = new SocialPostModel();
        $this->userModel = new UserModel();
    }

    public function adminDashboard()
    {
        return view('pages/adminSide/admin_dashboard');
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