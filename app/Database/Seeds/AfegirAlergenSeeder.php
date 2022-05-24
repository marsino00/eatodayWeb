<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirAlergenSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        $cont  = [
            'codi_alergen' => 1,
            'descripcio'  => 'gluten',
        ];

        $this->db->table('alergen')->insert($cont);

        for ($i = 2; $i < 11; $i++) {

            $data = [
                'codi_alergen' => $i,
                'descripcio'  => "alergen" . $i,
            ];
            // $cont  = [
            //     'codi_alergen' => 1,
            //     'descripcio'  => 'gluten',
            // ];

            $this->db->table('alergen')->insert($data);
        }
    }
}
