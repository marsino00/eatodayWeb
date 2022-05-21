<?php

namespace App\Models;

use CodeIgniter\Model;

class CartaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'carta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["nom", "descripcio", "actiu"];

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
     * Consulta a la bd per trobar una carta a partir del idcategoria
     */
    public function getCartabyIdCategoria($id = null)
    {
        $this->select('carta.id_carta,carta.nom,carta.descripcio,carta.actiu');
        $this->from('categoria', 'carta');
        $this->join('categoria_carta', 'categoria.id_categoria=categoria_carta.id_categoria');
        $this->join('carta', 'categoria_carta.id_carta = carta.id_carta');
        $this->where('categoria.id_categoria', $id);
        return $this->findAll();
    }
}
