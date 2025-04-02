<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSocialPostsTable extends Migration
{
    public function up()
    {
        // Create social_posts table
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,  // Match usertable.id
                'auto_increment' => true,
            ],
            'user_id'     => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,  // Must match referenced column
                'null'       => false,
            ],
            'message'     => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'created_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        // Add the primary key
        $this->forge->addPrimaryKey('id');

        // Ensure `usertable` exists before adding the foreign key
        $this->forge->addForeignKey('user_id', 'usertable', 'id', 'CASCADE', 'CASCADE');

        // Create the table
        $this->forge->createTable('social_posts');
    }

    public function down()
    {
        // Drop the social_posts table
        $this->forge->dropTable('social_posts');
    }
}
