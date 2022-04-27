<?php

namespace App\Models;

use CodeIgniter\Model;

class EstablimentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'establiment';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["nom_establiment", "tipus_establiment", "descripcio", "pais", "adreca", "telefon", "horari"];

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
    // public function create($nom_establiment, $tipus_establiment, $descripcio, $pais, $adreca,$telefon,$horari, $fotografies, $logo){


    // }

    public function getEstablimentbyId($id = null)
    {
        $query = $this->query("SELECT * from establiment where codi_establiment=$id");

        foreach ($query->getResult() as $row) {
            return $row;
        }
    }

    public function getCartabyIdCategoria($id = null)
    {
        $query = $this->query("SELECT carta.id_carta,carta.nom,carta.descripcio,carta.actiu FROM categoria INNER JOIN carta  ON categoria.codi_establiment=carta.codi_establiment WHERE establiment.codi_establiment=$id");

        foreach ($query->getResult() as $row) {
            return $row;
        }
    }
}
