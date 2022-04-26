<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAuthPermissions extends Seeder
{
    public function run()
    {
        $authorize = $auth = service('authorization');
        $authorize->createPermission('news.manage', 'Allows a user to create, edit, and delete news');
        $authorize->createPermission('news.add', 'Allows a user to create news');
        $authorize->createPermission('news.update', 'Allows a user to edit news');
        $authorize->createPermission('news.delete', 'Allows a user to delete news');
        $authorize->createPermission('news.enter', 'Allows a user to enter a news');
        # Add permissions to Administradors
        $authorize->addPermissionToGroup('news.manage', 'administradors');
        $authorize->addPermissionToGroup('news.add', 'administradors');
        $authorize->addPermissionToGroup('news.update', 'administradors');
        $authorize->addPermissionToGroup('news.delete', 'administradors');

        # Add permissions to usuaris
        $authorize->addPermissionToGroup('news.manage', 'usuaris');
        $authorize->addPermissionToGroup('news.add', 'usuaris');
        $authorize->addPermissionToGroup('news.update', 'usuaris');
        $authorize->addPermissionToGroup('news.delete', 'usuaris');

        # Add generics permissions
        $authorize->addPermissionToGroup('news.enter', 'administradors');
        $authorize->addPermissionToGroup('news.enter', 'professors');
        $authorize->addPermissionToGroup('news.enter', 'convidats');
    }
}
