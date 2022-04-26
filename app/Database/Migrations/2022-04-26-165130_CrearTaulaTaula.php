<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaTaula extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'codi_taula'          => [
                'type'           => 'INT',
                'auto_increment' => false,
                'null'           => false,
            ],
            'codi_establiment'          => [
                'type'           => 'INT',
                'auto_increment' => false,
                'null'           => false,
            ],
        ]);
        $this->forge->addPrimaryKey('codi_taula', true);
        $this->forge->addForeignKey('codi_establiment', 'establiment', 'codi_establiment');

        $this->forge->createTable('taula');
    }

    public function down()
    {
        $this->forge->dropTable('taula');
    }
}
