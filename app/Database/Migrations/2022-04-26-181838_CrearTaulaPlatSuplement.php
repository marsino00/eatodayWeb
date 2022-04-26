<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


class CrearTaulaPlatSuplement extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_plat_suplement'          => [
                'type'           => 'INT',
                'auto_increment' => true,
                'null'           => false,
            ],
            'id_plat'          => [
                'type'           => 'INT',
            ],
            'id_suplement'          => [
                'type'           => 'INT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_plat_suplement', true);
        $this->forge->addForeignKey('id_suplement', 'suplement', 'id_suplement');
        $this->forge->addForeignKey('id_plat', 'plat', 'id_plat');

        $this->forge->createTable('plat_suplement');
    }

    public function down()
    {
        $this->forge->dropTable('plat_suplement');
    }
}
