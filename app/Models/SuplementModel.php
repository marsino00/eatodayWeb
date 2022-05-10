<?php

namespace App\Models;

use CodeIgniter\Model;

class SuplementModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'suplement';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["descripcio", "preu"];

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

    public function getSuplementbyIdPlat($id = null)
    {
        $this->select('suplement.id_suplement,suplement.descripcio,suplement.preu');
        $this->from('plat', 'suplement');
        $this->join('plat_suplement', 'plat.id_plat=plat_suplement.id_plat');
        $this->join('suplement', 'plat_suplement.id_suplement = suplement.id_suplement');
        $this->where('plat.id_plat', $id);
        return $this->findAll();
    }
}
