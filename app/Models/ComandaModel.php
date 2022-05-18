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
    protected $allowedFields    = ["estat_comanda", "data", "comensals", "codi_taula", "id_client", "id_cambrer"];

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
    public function getAllComandes()
    {
        $query = $this->query("SELECT * from comanda WHERE estat_comanda!='FINALITZADA' && estat_comanda!='NOPAGADA'");
        $comandes = [];
        foreach ($query->getResult() as $row) {
            array_push($comandes, $row);
        }
        return $comandes;
    }
    public function getComandabyCodiTaula($id = null)
    {
        return $this->where("codi_taula", $id)->select("*")->findAll();
    }
    public function getComandabyClient($email = null)
    {
        $this->select('comanda.id_comanda,comanda.estat_comanda,comanda.comensals,comanda.codi_taula');
        $this->from('comanda', 'users');
        $this->join('users', 'users.id=comanda.id_client');
        $this->where('users.email', $email);
        return $this->findAll();
    }

    public function afegirComanda($estat_comanda, $comensals, $codi_taula, $id_client)
    {
        $this->insert(["estat_comanda" => $estat_comanda, "comensals" => $comensals, "codi_taula" => $codi_taula, "id_client" => $id_client]);
        return $this->insertID;
    }
    public function changeEstatComanda($id, $estat_comanda)
    {

        $this->set('estat_comanda', $estat_comanda)->where('id_comanda', $id)->update();
    }
}
