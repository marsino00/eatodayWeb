<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaCartaPlat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_carta_plat'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'id_carta'          => [
                'type'           => 'INT',
            ],
            'id_plat'          => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_carta_plat', true);
        $this->forge->addForeignKey('id_carta', 'carta', 'id_carta');
        $this->forge->addForeignKey('id_plat', 'plat', 'id_plat');

        $this->forge->createTable('carta_plat');
    }

    public function down()
    {
        $this->forge->dropTable('carta_plat');
    }
}
