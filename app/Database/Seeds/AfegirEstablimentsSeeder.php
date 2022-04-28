<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirEstablimentsSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        for ($i = 1; $i < 11; $i++) {
            $data = [
                'codi_establiment' => $i, //$title => $fake->sentence(6)
                'nom_establiment' => $fake->realText(25),  //$title => $fake->sentence(6)
                'tipus_establiment'  => $fake->realText(10), //$desc => $fake->text(100)
                'descripcio'  => $fake->realText(100), //$desc => $fake->text(100)
                'pais'  => $fake->country(), //$desc => $fake->text(100)
                'adreca'  => $fake->address(), //$desc => $fake->text(100)
                'telefon'  => $fake->phoneNumber(), //$desc => $fake->text(100)
                'horari'  => $fake->realText(30), //$desc => $fake->text(100)
            ];

            $this->db->table('establiment')->insert($data);
        }
    }
}
