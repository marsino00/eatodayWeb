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


    /**
     * Consulta a la bd per obtenir totes les comandes
     */
    public function getAllComandes()
    {
        $query = $this->query("SELECT * from comanda WHERE estat_comanda!='FINALITZADA' && estat_comanda!='NOPAGADA'");
        $comandes = [];
        foreach ($query->getResult() as $row) {
            array_push($comandes, $row);
        }
        return $comandes;
    }


    /**
     * Consulta a la bd per trobar comandes a partir del codi de taula
     */
    public function getComandabyCodiTaula($id = null)
    {
        return $this->where("codi_taula", $id)->select("*")->findAll();
    }

    /**
     * Consulta a la bd per trobar comandes a partir del email d'un client
     */
    public function getComandabyClient($email = null)
    {
        $this->select('comanda.id_comanda,comanda.estat_comanda,comanda.comensals,comanda.codi_taula');
        $this->from('comanda', 'users');
        $this->join('users', 'users.id=comanda.id_client');
        $this->where('users.email', $email);
        return $this->findAll();
    }


    /**
     * Consulta a la bd per afegir una comanda a partir d'un pàrametres concrets
     */
    public function afegirComanda($estat_comanda, $comensals, $codi_taula, $email)
    {

        $model = new UserModel();
        $data = $model->obtenirUsuari($email);
        $this->insert(["estat_comanda" => $estat_comanda, "comensals" => $comensals, "codi_taula" => $codi_taula, "id_client" => $data->id]);
        return $this->insertID;
    }

    /**
     * Consulta a la bd per canviar l'estat d'una comanda
     */
    public function changeEstatComanda($id, $estat_comanda, $email)
    {
        $model = new UserModel();
        $data = $model->obtenirUsuari($email);
        $this->set('estat_comanda', $estat_comanda)->set('id_cambrer', $data->id)->where('id_comanda', $id)->update();
    }
}
