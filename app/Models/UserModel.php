<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usertable'; // Ensure this matches your database table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'role']; // Added 'role'
    protected $useTimestamps = true;

    // Hash Password Before Save
    protected function beforeInsert(array $data)
    {
        $data = $this->hashPassword($data);
        return $data;
    }

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}