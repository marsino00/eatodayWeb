<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaPlat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_plat'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'nom'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'descripcio_breu'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'descripcio_detallada'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'preu'          => [
                'type'           => 'FLOAT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_plat', true);
        $this->forge->createTable('plat');
    }

    public function down()
    {
        $this->forge->dropTable('plat');
    }
}
