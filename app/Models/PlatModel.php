<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'plat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["nom", "descripcio_breu", "descripcio_detallada", "preu"];

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

    public function getPlatbyIdCarta($id = null)
    {
        $this->select('plat.id_plat,plat.nom,plat.descripcio_breu,plat.descripcio_detallada,plat.preu');
        $this->from('carta', 'plat');
        $this->join('carta_plat', 'carta.id_carta=carta_plat.id_carta');
        $this->join('plat', 'carta_plat.id_plat = plat.id_plat');
        $this->where('carta.id_carta', 1);
        return $this->findAll();
    }
}
