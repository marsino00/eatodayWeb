<?php

namespace App\Models;

use CodeIgniter\Model;

class ComandaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'comanda';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ["estat_comanda", "data", "comensals", "codi_taula"];

    // Dates
    protected $useTimestamps = true;
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
    public function getComandabyCodiTaula($id = null)
    {
        return $this->where("codi_taula", $id)->select("*")->findAll();
    }
    public function getComandabyUser($id = null)
    {
        return $this->where("codi_taula", $id)->select("*")->findAll();
    }

    public function afegirComanda($estat_comanda, $comensals, $codi_taula)
    {
        $this->insert(["estat_comanda" => $estat_comanda, "comensals" => $comensals, "codi_taula" => $codi_taula]);
    }
    public function changeEstatComanda($id, $estat_comanda)
    {
        // // $data = [
        // //     'id' => $id,
        // //     'estat_comanda' =>  $estat_comanda,
        // ];

        $this->set('estat_comanda', $estat_comanda)->where('id_comanda', $id)->update();
    }
}
