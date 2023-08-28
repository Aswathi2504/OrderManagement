<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'customer_id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                
            ],
            'product_id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                
            ],
            'status' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                
            ],
           
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
    
        ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
