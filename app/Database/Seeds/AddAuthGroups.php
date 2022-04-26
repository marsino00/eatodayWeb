<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAuthGroups extends Seeder
{
    public function run()
    {
        $authorize = $auth = service('authorization');
        $authorize->createGroup('administradors', 'Usuaris administradors del sistema');
        $authorize->createGroup('usuaris', 'Usuaris generals');
        $authorize->createGroup('convidats', 'Usuaris convidats');
    }
}
