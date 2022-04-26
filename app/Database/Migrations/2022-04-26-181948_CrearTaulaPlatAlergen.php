<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaPlatAlergen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_plat_alergen'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'id_plat'          => [
                'type'           => 'INT',
            ],
            'codi_alergen'          => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_plat_alergen', true);
        $this->forge->addForeignKey('codi_alergen', 'alergen', 'codi_alergen');
        $this->forge->addForeignKey('id_plat', 'plat', 'id_plat');

        $this->forge->createTable('plat_alergen');
    }

    public function down()
    {
        $this->forge->dropTable('plat_alergen');
    }
}
