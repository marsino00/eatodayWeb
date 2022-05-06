<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirPlatSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");
        $data = [
            'id_plat' => 1, //$title => $fake->sentence(6)
            'nom' => 'CheeseBurguer',  //$title => $fake->sentence(6)
            'descripcio_breu'  => 'Hamburguesa amb formatge', //$desc => $fake->text(100)
            'descripcio_detallada'  => 'Hamburguesa amb formatge amb carn de vedella de les vaques del Pirineu', //$desc => $fake->text(100)
            'preu'  => '6,00',
            'tipus'  => "Menjar",
        ];

        $this->db->table('plat')->insert($data);
        for ($i = 2; $i < 11; $i++) {
            $data = [
                'id_plat' => $i, //$title => $fake->sentence(6)
                'nom' => $fake->realText(10),  //$title => $fake->sentence(6)
                'descripcio_breu'  => $fake->realText(25), //$desc => $fake->text(100)
                'descripcio_detallada'  => $fake->realText(50), //$desc => $fake->text(100)
                'preu'  => $fake->randomFloat(),
                'tipus'  => "Beguda",
            ];

            $this->db->table('plat')->insert($data);
        }
    }
}
