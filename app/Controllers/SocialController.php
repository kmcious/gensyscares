<?php

namespace App\Controllers;

use App\Models\SocialPostModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class SocialController extends Controller
{
    protected $socialPostModel;
    protected $userModel;

    public function __construct()
    {
        $this->socialPostModel = new SocialPostModel();
        $this->userModel = new UserModel();
    }

    // Display social posts
    public function index()
    {
        $data['posts'] = $this->socialPostModel
            ->join('usertable', 'social_posts.user_id = usertable.id')
            ->select('social_posts.id, social_posts.message, usertable.name as user_name, social_posts.created_at')
            ->orderBy('social_posts.created_at', 'DESC')
            ->findAll();

        return view('social/index', $data);
    }

    // Create a new social post (AJAX)
    public function create()
    {
        // Ensure request is AJAX
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'error' => 'Invalid request']);
        }

        // Check user session
        $session = session();
        if (!$session->get('logged_in') || !$session->get('user_id')) {
            return $this->response->setJSON(['success' => false, 'error' => 'User not logged in']);
        }

        // Read JSON body correctly
        $json = $this->request->getJSON();
        if (!$json || empty($json->message)) {
            return $this->response->setJSON(['success' => false, 'error' => 'Message cannot be empty']);
        }

        $message = trim($json->message);
        $userId = $session->get('user_id');

        // Insert into database
        $saveResult = $this->socialPostModel->insert([
            'user_id' => $userId,
            'message' => $message,
        ]);

        if (!$saveResult) {
            log_message('error', 'Database save failed: ' . print_r($this->socialPostModel->errors(), true));
            return $this->response->setJSON(['success' => false, 'error' => 'Database insertion failed']);
        }

        // Fetch user name
        $user = $this->userModel->find($userId);
        $userName = $user ? $user['name'] : 'Unknown User';

        return $this->response->setJSON([
            'success' => true,
            'user_name' => $userName,
            'message' => $message,
        ]);
    }
}
