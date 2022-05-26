<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirAlergenSeeder extends Seeder
{
    public function run()
    {
        // $fake = Factory::create("es_ES");
        $arrayAlergens = ["", "Tramús", "Api", "Cacauets", "Cereals que contenen gluten", "Crustacis", "Fruits de closca", "Grand de sèsam", "Ous", "Llet", "Mol·luscs", "Mostassa", "Peix", "Soja", "Sulfits"];
        for ($i = 1; $i < count($arrayAlergens); $i++) {

            $data = [
                'codi_alergen' => $i,
                'descripcio'  => $arrayAlergens[$i],
            ];

            $this->db->table('alergen')->insert($data);
        }
    }
}
