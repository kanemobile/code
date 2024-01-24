<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'ordre' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'parent_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ]
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('menus', TRUE);
    }

    public function down() {
        $this->forge->dropTable('menus');
    }
}
