<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirComandaSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");
        $data = [
            'id_comanda' => 1, //$title => $fake->sentence(6)
            'codi_taula' => 1, //$title => $fake->sentence(6)
            'estat_comanda'  => "COMANDA", //$desc => $fake->text(100)
            'comensals' => $fake->numberBetween(1, 6),
            'id_users' => 1,
        ];

        $this->db->table('comanda')->insert($data);
        for ($i = 2; $i < 11; $i++) {
            $data = [
                'id_comanda' => $i, //$title => $fake->sentence(6)
                'codi_taula' => $i, //$title => $fake->sentence(6)
                'estat_comanda'  => "FACTURA", //$desc => $fake->text(100)
                'comensals' => $fake->numberBetween(1, 6),
                'id_users' => 1,

            ];

            $this->db->table('comanda')->insert($data);
        }
    }
}
