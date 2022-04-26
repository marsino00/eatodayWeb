<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaEstabliment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'codi_establiment'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'nom_establiment'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'auto_increment' => false,
                'null'           => false,
            ],
            'tipus_establiment'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'auto_increment' => false,
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'auto_increment' => false,
            ],
            'pais'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'adreca'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'telefon'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'horari'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('codi_establiment', true);

        $this->forge->createTable('establiment');
    }

    public function down()
    {
        $this->forge->dropTable('establiment');
    }
}
