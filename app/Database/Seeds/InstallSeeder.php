<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InstallSeeder extends Seeder
{
    public function run()
    {
        $this->call("AfegirEstablimentsSeeder");
        $this->call("AfegirCategoriaSeeder");
        $this->call("AfegirCartaSeeder");
        $this->call("AfegirPlatSeeder");
        $this->call("AfegirCategoriaCartaSeeder");
        $this->call("AfegirCartaPlatSeeder");
        $this->call("AfegirAlergenSeeder");
        $this->call("AfegirSuplementSeeder");
        $this->call("AfegirTaulaSeeder");
    }
}
