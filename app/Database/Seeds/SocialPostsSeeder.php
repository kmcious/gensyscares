<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SocialPostsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,  // Assuming a user with ID 1 exists
                'message' => 'This is the first social post.',
            ],
            [
                'user_id' => 2,  // Assuming a user with ID 2 exists
                'message' => 'This is the second social post.',
            ],
            [
                'user_id' => 1,  // Assuming a user with ID 1 exists
                'message' => 'This is the third social post.',
            ]
        ];

        // Insert the sample posts into the database
        $this->db->table('social_posts')->insertBatch($data);
    }
}