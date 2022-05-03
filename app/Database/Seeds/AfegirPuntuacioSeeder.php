<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use Faker\Factory;

class AfegirPuntuacioSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'id_puntuacio' => $i, //$title => $fake->sentence(6)
                'valoracio' => $fake->numberBetween(1, 5),  //$title => $fake->sentence(6)
                'comentari'  => $fake->realText(50), //$desc => $fake->text(100)
                'data_publicacio'  => $fake->date(), //$desc => $fake->text(100)
                'id_users'  => $fake->numberBetween(1, 4),
                'codi_establiment'  => $i,
            ];

            $this->db->table('puntuacio')->insert($data);
        }
    }
}
