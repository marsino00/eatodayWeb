<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaCategoriaCarta extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categoria_carta'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'id_categoria'          => [
                'type'           => 'INT',
            ],
            'id_carta'          => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_categoria_carta', true);
        $this->forge->addForeignKey('id_categoria', 'categoria', 'id_categoria');
        $this->forge->addForeignKey('id_carta', 'carta', 'id_carta');

        $this->forge->createTable('categoria_carta');
    }

    public function down()
    {
        $this->forge->dropTable('categoria_carta');
    }
}
