<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminUser extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('pages/adminSide/admin_user', $data);
    }

    public function updateRole()
    {
        $id = $this->request->getPost('id');
        $role = $this->request->getPost('role');
        $message = '';
    
        if ($id && $role) {
            $this->userModel->update($id, ['role' => $role]);
            $message = 'Role updated successfully!';
        } else {
            $message = 'Failed to update role!';
        }
    
        return redirect()->to('/admin/users')->with('message', $message);
    }
    
    public function deleteUser($id)
    {
        $message = '';
    
        if ($id) {
            $this->userModel->delete($id);
            $message = 'User deleted successfully!';
        }
    
        return redirect()->to('/admin/users')->with('message', $message);
    }

    public function addUser()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $role = $this->request->getPost('role');
    
        if ($name && $email && $password && $role) {
            $this->userModel->save([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
            ]);
    
            return redirect()->to('/admin/users')->with('message', 'User added successfully!');
        }
    
        return redirect()->to('/admin/users')->with('message', 'Failed to add user.');
    }

    public function getUser($id)
    {
        $user = $this->userModel->find($id);
        return $this->response->setJSON($user);
    }
}


