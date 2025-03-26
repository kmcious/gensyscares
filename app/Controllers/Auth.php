<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
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

    $userModel = new UserModel();

    $userData = [
        'name'     => $this->request->getPost('name'),
        'email'    => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role'     => 'user' // Default role as 'user'
    ];

    if ($userModel->insert($userData)) {
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

    //login

    public function login()
    {
        helper(['form']);
    
        if (!$this->request->is('post')) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Invalid request method. Use POST.'
            ]);
        }
    
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        $user = $userModel->where('email', $email)->first();
    
        if ($user && password_verify($password, $user['password'])) {
            // Store session data
            session()->set([
                'user_id' => $user['id'],
                'email'   => $user['email'],
                'role'    => $user['role'],
                'logged_in' => true,
            ]);
    
            // Determine redirect URL
            $redirectUrl = ($user['role'] === 'admin') ? base_url('admin/dashboard') : base_url('user/dashboard');
    
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
    
}
