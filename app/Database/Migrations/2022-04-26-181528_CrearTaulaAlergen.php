<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaAlergen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'codi_alergen'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('codi_alergen', true);
        $this->forge->createTable('alergen');
    }

    public function down()
    {
        $this->forge->dropTable('alergen');
    }
}
