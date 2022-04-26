<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTaulaPlatComandaSuplementAplicat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_plat_comanda_suplement_aplicat' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'id_plat_comanda'          => [
                'type'           => 'INT',
            ],
            'id_suplement_aplicat'          => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_plat_comanda_suplement_aplicat', true);
        $this->forge->addForeignKey('id_suplement_aplicat', 'suplement_aplicat', 'id_suplement_aplicat');
        $this->forge->addForeignKey('id_plat_comanda', 'plat_comanda', 'id_plat_comanda');

        $this->forge->createTable('plat_comanda_suplement_aplicat');
    }

    public function down()
    {
        $this->forge->dropTable('plat_comanda_suplement_aplicat');
    }
}
