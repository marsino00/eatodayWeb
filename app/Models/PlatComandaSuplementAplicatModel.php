<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatComandaSuplementAplicatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'plat_comanda_suplement_aplicat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id_plat_comanda", "id_suplement_aplicat"];

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
     * Crida a la bd per a crear la relacio entre pat_comanda i suplement_aplicat
     */
    public function afegirRelacioPCSA($id_plat_comanda, $id_suplement_aplicat)
    {
        $this->insert(["id_plat_comanda" => $id_plat_comanda, "id_suplement_aplicat" => $id_suplement_aplicat]);
    }
}
