<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAuthGroups extends Seeder
{
    public function run()
    {
        $authorize = $auth = service('authorization');
        $authorize->createGroup('administrador principal', 'Usuaris administradors principals');
        $authorize->createGroup('responsable de restaurant', 'Usuaris responsables de restaurant');
        $authorize->createGroup('usuari cambrer', 'Usuaris cambrers');
        $authorize->createGroup('usuari maitre', 'Usuaris maitres');
        $authorize->createGroup('usuari client', 'Usuaris clients');
    }
}
