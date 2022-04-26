<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaComanda extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_comanda'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'estat_comanda'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'comensals'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'codi_taula'          => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_comanda', true);
        $this->forge->addForeignKey('codi_taula', 'taula', 'codi_taula');
        $this->forge->createTable('comanda');
    }

    public function down()
    {
        $this->forge->dropTable('comanda');
    }
}
