<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Models\PuntuacioModel;

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


    /**
     * Funció per a obtenir les imatges d'un establiment concret
     */
    public function obtenirArxius($path)
    {
        if (!file_exists($path)) {
            return [];
        }
        $dir = opendir($path);
        $arrayElements = [];
        while ($elemento = readdir($dir)) {
            if ($elemento != "." && $elemento != "..") {
                if (is_dir($path . $elemento)) {
                } else {
                    array_push($arrayElements, $elemento);
                }
            }
        }
        return $arrayElements;
    }

    /**
     * Crido a la funcio anterior per trobar la ruta concreta i recorrer els fitxers de la mateixa
     */
    public function getFile($codi_establiment, $tipus)
    {
        $ruta = WRITEPATH .  "uploads" . DIRECTORY_SEPARATOR . $codi_establiment . DIRECTORY_SEPARATOR . "fotos" . DIRECTORY_SEPARATOR . $tipus;
        $arrayFotos = $this->obtenirArxius($ruta);
        $fotosEstabliment = [];
        for ($i = 0; $i < count($arrayFotos); $i++) {
            $file = new \CodeIgniter\Files\File(WRITEPATH . "uploads" . DIRECTORY_SEPARATOR . $codi_establiment . DIRECTORY_SEPARATOR . "fotos" . DIRECTORY_SEPARATOR . $tipus . DIRECTORY_SEPARATOR . $arrayFotos[$i]);

            if (!$file->isFile()) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No found');
            }


            $filedata = new \SplFileObject($file->getPathname(), "r");

            $data1 = $filedata->fread($filedata->getSize());

            array_push($fotosEstabliment, base64_encode($data1));
        }
        return $fotosEstabliment;
    }

    /**
     * Crida a la bd per a obtenir tots els establiments
     */
    public function getAllEstabliments()
    {
        $query = $this->query("SELECT * from establiment");
        $establiments = [];
        foreach ($query->getResult() as $row) {
            $photos = $this->getFile($row->codi_establiment, "establiment");
            $pm = new PuntuacioModel();
            $row->valoracio_mitjana = $pm->getPuntuacio($row->codi_establiment);
            $row->fotos = $photos;
            array_push($establiments, $row);
        }
        return $establiments;
    }

    /**
     * Crida a la bd per a obtenir  dades d'un establiment a partir del codi del mateix
     */
    public function getEstablimentbyId($id = null)
    {
        $query = $this->query("SELECT * from establiment where codi_establiment=$id");
        $establiments = [];

        foreach ($query->getResult() as $row) {
            $photos = $this->getFile($row->codi_establiment, "establiment");
            $pm = new PuntuacioModel();
            $row->valoracio_mitjana = $pm->getPuntuacio($row->codi_establiment);

            $row->fotos = $photos;
            array_push($establiments, $row);
        }
        return $establiments;
    }


    /**
     * Crida a la bd per a obtenir les cartes d'un id_categoria concret
     */
    public function getCartabyIdCategoria($id = null)
    {
        $query = $this->query("SELECT carta.id_carta,carta.nom,carta.descripcio,carta.actiu FROM categoria INNER JOIN carta  ON categoria.codi_establiment=carta.codi_establiment WHERE establiment.codi_establiment=$id");

        foreach ($query->getResult() as $row) {
            return $row;
        }
    }

    /**
     * Crida a la bd per a obtenir el nom i codi d'un llistat d'establiments
     */
    public function obtenirEstabliments()
    {
        $query = $this->query("SELECT nom_establiment,codi_establiment from establiment");

        return  $query->getResultArray();
    }
}
