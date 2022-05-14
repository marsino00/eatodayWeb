<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatComandaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'plat_comanda';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ["estat_plat", "hora_demanat", "hora_lliurat", "hora_elaborat", "id_comanda", "id_plat"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'hora_demanat';
    protected $updatedField  = 'hora_elaborat';
    protected $deletedField  = 'hora_lliurat';

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

    public function getPlatComandabyIdComanda($id = null)
    {

        $this->select("plat_comanda.estat_plat,plat_comanda.hora_demanat,plat_comanda.hora_elaborat,plat_comanda.hora_lliurat,plat_comanda.id_plat_comanda,plat.id_plat");
        $this->from('plat', 'plat_comanda');
        $this->join('plat_comanda', 'plat_comanda.id_plat=plat.id_plat');
        $this->where('plat_comanda.id_comanda', $id);
        $queryPlats = $this->findAll();
        return $queryPlats;
        foreach ($queryPlats as $row) {
            return $row;
        }
        // return $this->where("id_comanda", $id)->select("estat_plat,hora_demanat,hora_elaborat,hora_lliurat,id_plat_comanda")->findAll();
    }
    public function afegirPlatComanda($id_plat, $id_comanda, $estat_plat)
    {
        $this->insert(["id_plat" => $id_plat, "id_comanda" => $id_comanda, "estat_plat" => $estat_plat]);
    }
}
