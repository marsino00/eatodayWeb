<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaCarta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_carta'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'actiu'          => [
                'type'           => 'TINYINT',
            ],
            'codi_establiment'          => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_carta', true);
        $this->forge->addForeignKey('codi_establiment', 'establiment', 'codi_establiment');

        $this->forge->createTable('carta');
    }

    public function down()
    {
        $this->forge->dropTable('carta');
    }
}
