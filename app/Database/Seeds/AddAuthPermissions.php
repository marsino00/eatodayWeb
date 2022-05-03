<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAuthPermissions extends Seeder
{
    public function run()
    {
        $authorize = $auth = service('authorization');
        $authorize->createPermission('usuaris.manage', 'Permet al usuari realitzar CRUD dels usuaris ');
        $authorize->createPermission('grups.manage', 'Permet al usuari realitzar CRUD dels grups ');
        $authorize->createPermission('establiments.manage', 'Permet al usuari realitzar CRUD dels establiments ');
        $authorize->createPermission('categories.manage', 'Permet al usuari realitzar CRUD de les categories ');
        $authorize->createPermission('cartes.manage', 'Permet al usuari realitzar CRUD de les cartes ');
        $authorize->createPermission('plats.manage', 'Permet al usuari realitzar CRUD dels plats ');
        $authorize->createPermission('taules.manage', 'Permet al usuari realitzar CRUD de les taules ');
        $authorize->createPermission('comandes.manage', 'Permet al usuari realitzar CRUD de les comandes ');
        $authorize->createPermission('plats_comanda.manage', 'Permet al usuari realitzar CRUD dels plats_comanda ');
        $authorize->createPermission('permissions.read', 'Permet al usuari obtenir els permissos');
        $authorize->createPermission('comandes.read', 'Permet al usuari visualitzar les comandes');
        $authorize->createPermission('plats_comanda.read', 'Permet al usuari visualitzar els plats_comanda');
        $authorize->createPermission('plats.read', 'Permet al usuari visualitzar els plats');



        # Add permissions to Administradors
        $authorize->addPermissionToGroup('usuaris.manage', 'administrador principal');
        $authorize->addPermissionToGroup('grups.manage', 'administrador principal');
        $authorize->addPermissionToGroup('establiments.manage', 'administrador principal');
        $authorize->addPermissionToGroup('categories.manage', 'administrador principal');
        $authorize->addPermissionToGroup('cartes.manage', 'administrador principal');
        $authorize->addPermissionToGroup('plats.manage', 'administrador principal');
        $authorize->addPermissionToGroup('taules.manage', 'administrador principal');
        $authorize->addPermissionToGroup('permission.read', 'administrador principal');

        # Add permissions to responsable de restaurant
        $authorize->addPermissionToGroup('establiments.manage', 'responsable de restaurant');
        $authorize->addPermissionToGroup('categories.manage', 'responsable de restaurant');
        $authorize->addPermissionToGroup('cartes.manage', 'responsable de restaurant');
        $authorize->addPermissionToGroup('plats.manage', 'responsable de restaurant');
        $authorize->addPermissionToGroup('taules.manage', 'responsable de restaurant');

        # Add permissions to usuari cambrer
        $authorize->addPermissionToGroup('comandes.manage', 'usuari cambrer');
        $authorize->addPermissionToGroup('plat_comandes.manage', 'usuari cambrer');

        # Add permissions to usuari maitre
        $authorize->addPermissionToGroup('comandes.read', 'usuari maitre');
        $authorize->addPermissionToGroup('plats_comanda.read', 'usuari maitre');
        $authorize->addPermissionToGroup('plats.read', 'usuari maitre');
    }
}
