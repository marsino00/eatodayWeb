<?php

namespace App\Models;

use CodeIgniter\Model;

class PuntuacioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'puntuacio';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["valoracio", "comentari", "id_usuari", "codi_establiment"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function obtenirPuntuacio($codi_establiment)
    {
        $this->select('puntuacio.id_puntuacio,puntuacio.valoracio,puntuacio.comentari,puntuacio.data_publicacio,users.name,users.surnames');
        $this->from('establiment', 'users');
        $this->join('puntuacio', 'establiment.codi_establiment=puntuacio.codi_establiment');
        $this->join('users', 'puntuacio.id_users = users.id');
        $this->where('establiment.codi_establiment', $codi_establiment);

        return $this->findAll();
    }
}
