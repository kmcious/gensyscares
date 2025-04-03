<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        // Initialize the user model and session service
        $this->userModel = new UserModel();
        $this->session = session(); // ✅ Initialize session
    }

    public function register()
    {
        helper(['form']);

        if (!$this->request->is('post')) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Invalid request method. Use POST.'
            ]);
        }

        $validationRules = [
            'name'     => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email|is_unique[usertable.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'matches[password]'
        ];

        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => $this->validator->getErrors()
            ]);
        }

        $userData = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user' // Default role as 'user'
        ];

        if ($this->userModel->insert($userData)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Registration successful'
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to register user'
            ]);
        }
    }

    // Login method
    public function login()
    {
        helper(['form']);

        if (!$this->request->is('post')) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Invalid request method. Use POST.'
            ]);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Store session data
            $this->session->set([
                'user_id' => $user['id'],
                'email'   => $user['email'],
                'role'    => $user['role'],
                'logged_in' => true,
            ]);

            // Determine redirect URL
            $redirectUrl = ($user['role'] === 'admin') ? base_url('adminSide/dashboard') : base_url('userSide/dashboard');

            return $this->response->setJSON([
                'status'  => 'success',
                'redirect' => $redirectUrl
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Invalid email or password'
            ]);
        }
    }

    // Logout method
    public function logout()
    {
        $this->session->destroy(); // ✅ Use session service to destroy the session
        return redirect()->to(base_url('/'));
    }

    //update profile method
    public function updateProfile()
    {
        helper(['form']);
    
        if (!$this->request->is('post')) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Invalid request method. Use POST.'
            ]);
        }
    
        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);
    
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        $name = $this->request->getPost('name');
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
    
        // Prevent update if current password is empty
        if (empty($currentPassword)) {
            return redirect()->back()->with('error', 'Current password is required to update profile.');
        }
    
        // Validate current password
        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
    
        $updateData = ['name' => $name];
    
        // Check if new password is provided
        if (!empty($newPassword)) {
            // Ensure new password is not the same as the current password
            if (password_verify($newPassword, $user['password'])) {
                return redirect()->back()->with('error', 'New password cannot be the same as the current password.');
            }
    
            // Check if new password matches confirm password
            if ($newPassword !== $confirmPassword) {
                return redirect()->back()->with('error', 'New passwords do not match.');
            }
    
            // Hash and update password
            $updateData['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }
    
        // Update user profile
        if ($this->userModel->update($userId, $updateData)) {
            $this->session->setFlashdata('success', 'Profile updated successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to update profile.');
        }
    
        return redirect()->back();
    }
    
}
