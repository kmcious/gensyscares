<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\SocialPostModel;
class Home extends BaseController
{

    protected $socialPostModel;
    protected $userModel;

    public function __construct()
    {
        $this->socialPostModel = new SocialPostModel();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        // Get the posts from the database
        $data['posts'] = $this->socialPostModel
            ->join('usertable', 'social_posts.user_id = usertable.id')
            ->select('social_posts.id, social_posts.message, usertable.name as user_name, social_posts.created_at')
            ->orderBy('social_posts.created_at', 'DESC')
            ->findAll();

      
        return view('home', $data);
    }
}