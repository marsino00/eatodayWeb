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
        $this->forge->addPrimaryKey('id_categoria', true);
        $this->forge->addForeignKey('codi_establiment', 'establiment', 'codi_establiment');

        $this->forge->createTable('categoria');
    }

    public function down()
    {
        $this->forge->dropTable('categoria');
    }
}
