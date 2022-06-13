<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirMissatgeSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");

        $cont  = [
            'id_missatge' => 1,
            'text_missatge'  => 'Missatge de prova',
            'data_publicacio'  => date('d-m-y h:i:s'),
            'codi_establiment'  => 1,
            'id_users'  => 1,
            'id_tema' => 1

        ];

        $this->db->table('missatge')->insert($cont);

        for ($i = 2; $i < 11; $i++) {

            $data = [
                'id_missatge' => $i,
                'text_missatge'  => $fake->realText(50),
                'data_publicacio'  => date('d-m-y h:i:s'),
                'codi_establiment'  => 1,
                'id_users'  => 1,
                'id_tema' => 1
            ];

            $this->db->table('missatge')->insert($data);
        }
    }
}
