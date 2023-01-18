<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produtcs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' =>[
                'type' => 'INT(64)',
                'auto_increment' => true,
                'null' => false
            ],
            'name' => [
                'type' => 'varchar(255)',
                // 'null' => false

            ],
            'price' => [
                'type' => 'INT(11)',
                // 'null' => false
            ],
            'image' => [
                'type' => 'varchar(255)',
                'default' => 'default.jpg',
                // 'null' => false
            ],
            'description' =>[
                'type' => 'TEXT',
                'null' => false
            ]
        ]);
        $this->forge->addKey('product_id',true);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
