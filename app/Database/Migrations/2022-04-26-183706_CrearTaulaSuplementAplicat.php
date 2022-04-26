<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaSuplementAplicat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_suplement_aplicat' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'descripcio'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addPrimaryKey('id_suplement_aplicat', true);
        $this->forge->createTable('suplement_aplicat');
    }

    public function down()
    {
        $this->forge->dropTable('suplement_aplicat');
    }
}
