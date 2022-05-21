<?php

namespace App\Models;

use CodeIgniter\Model;

class AlergenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'alergen';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["descripcio"];

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


    /**
     * Consulta a la bd per trobar un alergen a partir del idplat
     */
    public function getAlergenbyIdPlat($id = null)
    {
        $this->select('alergen.codi_alergen,alergen.descripcio');
        $this->from('plat', 'alergen');
        $this->join('plat_alergen', 'plat.id_plat=plat_alergen.id_plat');
        $this->join('alergen', 'plat_alergen.codi_alergen = alergen.codi_alergen');
        $this->where('plat.id_plat', $id);
        return $this->findAll();
    }
}
