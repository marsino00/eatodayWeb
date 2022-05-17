<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaMissatges extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_missatge' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'text_missatge'          => [
                'type'           => 'VARCHAR',
                'constraint'           => '255',
            ],
            'data_publicacio'          => [
                'type'           => 'DATETIME',
            ],
            'codi_establiment'          => [
                'type'           => 'INT',
            ], 'id_users'          => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],

        ]);
        $this->forge->addPrimaryKey('id_missatge', true);
        $this->forge->addForeignKey('codi_establiment', 'establiment', 'codi_establiment');
        $this->forge->addForeignKey('id_users', 'users', 'id');

        $this->forge->createTable('missatge');
    }

    public function down()
    {
        $this->forge->dropTable('missatge');
    }
}
