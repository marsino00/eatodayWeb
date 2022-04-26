<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaCategoria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categoria'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'auto_increment' => false,
                'null'           => false,
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'auto_increment' => false,
            ],
            'codi_establiment'          => [
                'type'           => 'INT',
                'auto_increment' => false,
            ],
            'id_carta'          => [
                'type'           => 'INT',
            ],
            'actiu'          => [
                'type'           => 'TINYINT',
                'default'     => 1,
            ],
        ]);
        $this->forge->addPrimaryKey('id_categoria', true);
        $this->forge->addForeignKey('codi_establiment', 'establiment', 'codi_establiment');
        // $this->forge->addForeignKey('id_carta', 'carta', 'id_carta');
        $this->forge->createTable('categoria');
        // $this->forge->addForeignKey('id_carta', 'carta', 'id_carta');
    }

    public function down()
    {
        $this->forge->dropTable('categoria');
    }
}
