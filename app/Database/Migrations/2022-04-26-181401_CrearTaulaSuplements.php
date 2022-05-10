<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaSuplements extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_suplement'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'preu'          => [
                'type'           => 'DECIMAL',
                'constraint'     => '4,2',
            ],
        ]);
        $this->forge->addPrimaryKey('id_suplement', true);
        $this->forge->createTable('suplement');
    }

    public function down()
    {
        $this->forge->dropTable('suplement');
    }
}
