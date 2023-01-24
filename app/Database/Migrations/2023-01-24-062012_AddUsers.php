<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
    public function up()
    {
        //add users
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'user_name' => [
                'type'=> 'VARCHAR(100)',
            ],
            'user_mail' => [
                'type'=> 'VARCHAR(100)',
            ],
            'user_password' => [
                'type'=> 'VARCHAR(200)',
            ],
        ]);
        $this->forge->addPrimaryKey('user_id',true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
