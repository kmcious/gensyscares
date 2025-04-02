<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialPostModel extends Model
{
    protected $table = 'social_posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'message', 'created_at'];
    protected $useTimestamps = true;
}