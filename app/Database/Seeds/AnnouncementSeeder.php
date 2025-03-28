<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'      => 'Coastal Clean-up Drive',
                'event_date' => '2024-12-28',
                'location'   => 'Beachside, Lorem Ipsum City',
                'image_path' => 'images/announcementImage/image1.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Blood Donation Appeal',
                'event_date' => '2024-12-28',
                'location'   => 'Community Health Center, Ipsum Town',
                'image_path' => 'images/announcementImage/image2.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Genova Cares Christmas Party',
                'event_date' => '2024-12-22',
                'location'   => 'Genova Hall, Ipsum City',
                'image_path' => 'images/announcementImage/image3.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data into the database
        $this->db->table('announcements')->insertBatch($data);
    }
}