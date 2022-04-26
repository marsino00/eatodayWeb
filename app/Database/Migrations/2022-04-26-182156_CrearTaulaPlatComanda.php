<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaPlatComanda extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_plat_comanda'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'id_plat'          => [
                'type'           => 'INT',
            ],
            'id_comanda'          => [
                'type'           => 'INT',
            ],
            'estat_plat'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'hora_demanat'          => [
                'type'           => 'DATETIME',
            ],
            'hora_lliurat'          => [
                'type'           => 'DATETIME',
            ],
            'hora_elaborat'          => [
                'type'           => 'DATETIME',
            ],

        ]);
        $this->forge->addPrimaryKey('id_plat_comanda', true);
        $this->forge->addForeignKey('id_comanda', 'comanda', 'id_comanda');
        $this->forge->addForeignKey('id_plat', 'plat', 'id_plat');

        $this->forge->createTable('plat_comanda');
    }

    public function down()
    {
        $this->forge->dropTable('plat_alergen');
    }
}
