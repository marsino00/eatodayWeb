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
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["estat_plat", "hora_demanat", "hora_lliurat", "hora_elaborat", "id_comanda", "id_plat"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'hora_demanat';
    protected $updatedField  = 'hora_elaborat';
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

    public function getPlatComandabyIdComanda($id = null)
    {
        // dd($id);
        $this->select("plat_comanda.estat_plat,plat_comanda.hora_demanat,plat_comanda.hora_elaborat,plat_comanda.hora_lliurat,plat_comanda.id_plat_comanda,plat.id_plat");
        $this->from('plat', 'plat_comanda');
        $this->join('plat_comanda', 'plat_comanda.id_plat=plat.id_plat');
        $this->where('plat_comanda.id_comanda', $id);
        $queryPlats = $this->findAll();
        // dd($this->getLastQuery()->getQuery());
        return $queryPlats;
    }
    public function getSuplementAplicatByPlatComanda($id_plat_comanda)
    {
        $this->select('suplement_aplicat.id_suplement_aplicat,suplement_aplicat.descripcio,suplement_aplicat.preu');
        $this->from('plat_comanda', 'suplement_aplicat');
        $this->join('plat_comanda_suplement_aplicat', 'plat_comanda.id_plat_comanda=plat_comanda_suplement_aplicat.id_plat_comanda');
        $this->join('suplement_aplicat', 'plat_comanda_suplement_aplicat.id_suplement_aplicat = suplement_aplicat.id_suplement_aplicat');
        $this->where('plat_comanda.id_plat_comanda', $id_plat_comanda);
        return $this->findAll();
    }




    public function afegirPlatComanda($id_plat, $id_comanda, $estat_plat)
    {
        $this->insert(["id_plat" => $id_plat, "id_comanda" => $id_comanda, "estat_plat" => $estat_plat]);
        return $this->insertID;
    }
    public function changeEstatPlat($id, $estat_plat, $hora)
    {


        $this->set('estat_plat', $estat_plat)->set($hora, date('Y-m-d H:i:s ', time()))->where('id_plat_comanda', $id)->update();
    }
}
