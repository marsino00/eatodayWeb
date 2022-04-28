<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaPuntuacio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_puntuacio'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'valoracio'          => [
                'type'           => 'INT',
            ],
            'comentari'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'data_publicacio'          => [
                'type'           => 'DATETIME',
            ],
            'id_users'          => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'codi_establiment'          => [
                'type'           => 'INT',
                'constraint' => 11
            ],
        ]);
        $this->forge->addPrimaryKey('id_puntuacio', true);
        $this->forge->addForeignKey('id_users', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('codi_establiment', 'establiment', 'codi_establiment');
        $this->forge->createTable('puntuacio');
    }

    public function down()
    {
        $this->forge->dropTable('puntuacio');
    }
}
