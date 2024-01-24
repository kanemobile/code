<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agent extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'matricule' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'prenom' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'sexe' => [
                'type' => 'CHAR'
            ],
            'date_naissance' => [
                'type' => 'DATE',
            ],
            'lieu_naissance' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'telephone' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ],
            'email_personnel' => [
                'type' => 'VARCHAR',
                'constraint' => '75'
            ],
            'email_professionnel' => [
                'type' => 'VARCHAR',
                'constraint' => '75'
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('agents');
    }

    public function down()
    {
        $this->forge->dropTable('agents');
    }
}
