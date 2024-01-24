<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Table extends Migration
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
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'ordre' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->addForeignKey('menu_id', 'menus', 'id');

        $this->forge->createTable('tables', TRUE);
    }

    public function down() {
        $this->forge->dropTable('tables');
    }
}
