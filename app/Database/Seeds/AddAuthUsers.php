<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class AddAuthUsers extends Seeder
{
    public function run()
    {
        $authorize = $auth = service('authorization');
        $users = model(UserModel::class);

        $row = [
            'active'   => 1,
            'password' => '1234',
            'username' => 'admin',
            'email' => 'admin@me.local',
            'name' => 'Josep M',
            'surnames' => 'FR',
            'codi_establiment' => '1',
            // 'id_comanda' => '1',
            // 'codi_establiment' => '1',
        ];
        $user = new User($row);
        $userId = $users->insert($user);
        $authorize->addUserToGroup($userId, 'administrador principal');

        $row = [
            'active'   => 1,
            'password' => '1234',
            'username' => 'responsable',
            'email' => 'roger@roger.com',
            'name' => 'Roger',
            'surnames' => 'M P',
            'codi_establiment' => '2',
            // 'id_comanda' => '2',
        ];
        $user = new User($row);

        $userId = $users->insert($user);
        $authorize->addUserToGroup($userId, 'responsable del restaurant');

        $row = [
            'active'   => 1,
            'password' => '1234',
            'username' => 'cambrer',
            'email' => 'd@d.com',
            'name' => 'David',
            'surnames' => 'R F',
            'codi_establiment' => '3',
            // 'id_comanda' => '3',

        ];
        $user = new User($row);

        $userId = $users->insert($user);
        $authorize->addUserToGroup($userId, 'usuari cambrer');

        $row = [
            'active'   => 1,
            'password' => '1234',
            'username' => 'maitre',
            'email' => 'ma@ma.com',
            'name' => 'Maria Àngels',
            'surnames' => 'C',
            'codi_establiment' => '4',
            // 'id_comanda' => '4',
        ];
        $user = new User($row);

        $userId = $users->insert($user);
        $authorize->addUserToGroup($userId, 'usuari maitre');
    }
}
