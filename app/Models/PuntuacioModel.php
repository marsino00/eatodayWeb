<?php

namespace App\Models;

use CodeIgniter\Model;

class PuntuacioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'puntuacio';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["valoracio", "comentari",  "codi_establiment", "id_users", "data_publicacio"];

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
     * Crida a la bd per a partir d'un codi_establiment, obtenir les puntuacions corresponents
     */
    public function obtenirPuntuacio($codi_establiment)
    {
        $this->select("puntuacio.id_puntuacio,puntuacio.valoracio,puntuacio.comentari,date_format(puntuacio.data_publicacio, '%d/%m/%Y') as data_publicacio,users.name,users.surnames");
        $this->from('establiment', 'users');
        $this->join('puntuacio', 'establiment.codi_establiment=puntuacio.codi_establiment');
        $this->join('users', 'puntuacio.id_users = users.id');
        $this->where('establiment.codi_establiment', $codi_establiment);

        return $this->findAll();
    }

    /**
     * Crida a la bd per a partir d'un codi_establiment, obtenir la puntuacio mitjana del mateix
     */
    public function getPuntuacio($codi_establiment)
    {
        $query = $this->query("SELECT cast(avg(valoracio) as DECIMAL (2,1)) AS vm from puntuacio where codi_establiment=$codi_establiment");

        foreach ($query->getResult() as $row) {
            return $row;
        }
    }

    /**
     * Crida a la bd per a afegir una puntuacio, amb els seus atributs corresponents
     */
    public function afegirPuntuacio($valoracio, $comentari, $email, $codi_establiment)
    {
        $model = new UserModel();
        $data = $model->obtenirUsuari($email);
        $this->insert(['valoracio' => $valoracio, "data_publicacio" => date('Y-m-d H:i:s ', time()), 'comentari' => $comentari, 'codi_establiment' => $codi_establiment, 'id_users' => $data->id]);
    }
}
