<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Groupmenu extends Migration
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
            'group_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->addForeignKey('group_id', 'auth_groups', 'id');

        $this->forge->addForeignKey('menu_id', 'menus', 'id');

        $this->forge->createTable('groupmenus', TRUE);
    }

    public function down() {
        $this->forge->dropTable('groupmenus');
    }
}
