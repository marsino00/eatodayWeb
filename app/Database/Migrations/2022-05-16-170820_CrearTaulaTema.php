<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaTema extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tema' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'           => '255',
            ],


        ]);
        $this->forge->addPrimaryKey('id_tema', true);

        $this->forge->createTable('tema');
    }

    public function down()
    {
        $this->forge->dropTable('tema');
    }
}
