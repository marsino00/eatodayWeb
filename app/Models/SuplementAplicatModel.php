<?php

namespace App\Models;

use CodeIgniter\Model;

class SuplementAplicatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'suplement_aplicat';
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

    public function getSuplementbyIdPlatComanda($id = null)
    {
        $this->select('suplement_aplicat.id_suplement_aplicat,suplement_aplicat.descripcio');
        $this->from('plat_comanda', 'suplement_aplicat');
        $this->join('plat_comanda_suplement_aplicat', 'plat_comanda.id_plat_comanda=plat_comanda_suplement_aplicat.id_plat_comanda');
        $this->join('suplement_aplicat', 'plat_comanda_suplement_aplicat.id_suplement_aplicat = suplement_aplicat.id_suplement_aplicat');
        $this->where('plat_comanda.id_plat_comanda', $id);
        return $this->findAll();
    }
}
