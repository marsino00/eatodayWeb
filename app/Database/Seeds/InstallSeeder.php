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
        $this->call("AfegirComandaSeeder");
        $this->call("AfegirPlatComandaSeeder");
        $this->call("AfegirSuplementAplicatSeeder");
        $this->call("AfegirPlatComandaSuplementAplicatSeeder");
        $this->call("AddAuthGroups");
        $this->call("AddAuthPermissions");
        $this->call("AddAuthUsers");
        $this->call("AfegirPuntuacioSeeder");
        $this->call("AfegirPlatSuplementSeeder");
        $this->call("AfegirPlatAlergenSeeder");
    }
}
