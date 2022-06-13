<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InstallSeeder2 extends Seeder
{
    public function run()
    {
        $this->call("AddAuthGroups");
        $this->call("AddAuthPermissions");
        $this->call("AddAuthUsers");
        $this->call("AfegirComandaSeeder");
        $this->call("AfegirPlatComandaSeeder");
        $this->call("AfegirSuplementAplicatSeeder");
        $this->call("AfegirPlatComandaSuplementAplicatSeeder");

        $this->call("AfegirPuntuacioSeeder");
        $this->call("AfegirPlatSuplementSeeder");
        $this->call("AfegirPlatAlergenSeeder");
        $this->call("AfegirTemaSeeder");
        $this->call("AfegirMissatgeSeeder");
    }
}
