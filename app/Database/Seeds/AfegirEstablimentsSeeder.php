<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AfegirEstablimentsSeeder extends Seeder
{
    public function run()
    {
        $fake = Factory::create("es_ES");
        $data = [
            'codi_establiment' => 1, //$title => $fake->sentence(6)
            'nom_establiment' => 'Burguer King',  //$title => $fake->sentence(6)
            'tipus_establiment'  => 'Menjar ràpid', //$desc => $fake->text(100)
            'descripcio'  => 'Establiment de menjar ràpid especialitzat en hamburgueses', //$desc => $fake->text(100)
            'pais'  => $fake->country(), //$desc => $fake->text(100)
            'adreca'  => $fake->address(), //$desc => $fake->text(100)
            'telefon'  => $fake->phoneNumber(), //$desc => $fake->text(100)
            'horari'  => '9:00-21:00', //$desc => $fake->text(100)
            'rs_instagram'  => 'https://www.instagram.com/accounts/login/?next=/burgerking_es/', //$desc => $fake->text(100)
            'rs_facebook'  => 'https://www.facebook.com/burgerkingespana/', //$desc => $fake->text(100)
            'rs_twitter'  => 'https://twitter.com/burgerking_es?lang=ca', //$desc => $fake->text(100)
        ];

        $this->db->table('establiment')->insert($data);
        for ($i = 2; $i < 11; $i++) {
            $data = [
                'codi_establiment' => $i, //$title => $fake->sentence(6)
                'nom_establiment' => $fake->realText(10),  //$title => $fake->sentence(6)
                'tipus_establiment'  => $fake->realText(10), //$desc => $fake->text(100)
                'descripcio'  => $fake->realText(50), //$desc => $fake->text(100)
                'pais'  => $fake->country(), //$desc => $fake->text(100)
                'adreca'  => $fake->address(), //$desc => $fake->text(100)
                'telefon'  => $fake->phoneNumber(), //$desc => $fake->text(100)
                'horari'  => '9:00-21:00', //$desc => $fake->text(100)
                'rs_facebook'  => $fake->url(), //$desc => $fake->text(100)
                'rs_instagram'  => $fake->url(), //$desc => $fake->text(100)
                'rs_twitter'  => $fake->url(), //$desc => $fake->text(100)
            ];

            $this->db->table('establiment')->insert($data);
        }
    }
}
