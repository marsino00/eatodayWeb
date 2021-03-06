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
            'id_client'          => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'id_cambrer'          => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'created_at datetime default current_timestamp',
            'deleted_at datetime default null',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->addPrimaryKey('id_comanda', true);
        $this->forge->addForeignKey('codi_taula', 'taula', 'codi_taula');
        $this->forge->addForeignKey('id_cambrer', 'users', 'id');
        $this->forge->addForeignKey('id_client', 'users', 'id');

        $this->forge->createTable('comanda');
    }

    public function down()
    {
        $this->forge->dropTable('comanda');
    }
}
