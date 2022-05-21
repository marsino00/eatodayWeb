<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'plat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["nom", "descripcio_breu", "descripcio_detallada", "preu"];

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
     * Funció per a obtenir les imatges d'un plat concret
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
    public function getFile($codi_establiment, $tipus, $id_plat)
    {
        $ruta = WRITEPATH .  "uploads" . DIRECTORY_SEPARATOR . $codi_establiment . DIRECTORY_SEPARATOR . "fotos" . DIRECTORY_SEPARATOR . $tipus . DIRECTORY_SEPARATOR . $id_plat;
        $arrayFotos = $this->obtenirArxius($ruta);
        $fotosEstabliment = [];
        for ($i = 0; $i < count($arrayFotos); $i++) {
            $file = new \CodeIgniter\Files\File(WRITEPATH . "uploads" . DIRECTORY_SEPARATOR . $codi_establiment . DIRECTORY_SEPARATOR . "fotos" . DIRECTORY_SEPARATOR . $tipus . DIRECTORY_SEPARATOR . $id_plat . DIRECTORY_SEPARATOR . $arrayFotos[$i]);

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
     * Crida a la bd per a partir d'un id_carta, obtenir els palts corresponents
     */
    public function getPlatbyIdCarta($id = null)
    {
        $this->select('plat.id_plat,plat.nom,plat.descripcio_breu,plat.descripcio_detallada,plat.preu');
        $this->from('carta', 'plat');
        $this->join('carta_plat', 'carta.id_carta=carta_plat.id_carta');
        $this->join('plat', 'carta_plat.id_plat = plat.id_plat');
        $this->where('carta.id_carta', $id);
        $queryPlats = $this->findAll();


        $this->select('establiment.codi_establiment');
        $this->from('carta', 'plat');
        $this->join('carta_plat', 'carta.id_carta=carta_plat.id_carta');
        $this->join('plat', 'carta_plat.id_plat = plat.id_plat');
        $this->join('categoria_carta', 'categoria_carta.id_carta=carta.id_carta');
        $this->join('categoria', 'categoria.id_categoria = categoria_carta.id_carta');
        $this->join('establiment', 'categoria.codi_establiment = establiment.codi_establiment');
        $this->where('carta.id_carta', $id);
        $queryEstabliment = $this->findAll();
        $establiment = "";
        foreach ($queryEstabliment as $row) {
            $establiment = $row;
        }
        $plats = [];

        foreach ($queryPlats as $row) {
            $photos = $this->getFile($establiment["codi_establiment"], "plats", $row["id_plat"]);
            $row["fotos"] = $photos;
            array_push($plats, $row);
        }
        return $plats;
    }


    /**
     * Crida a la bd per a partir d'un id_plat_comanda, obtenir els palts corresponents
     */
    public function getPlatbyIdPlatComanda($id = null)
    {
        $this->select('plat.id_plat,plat.nom,plat.descripcio_breu,plat.descripcio_detallada,plat.preu');
        $this->from('carta', 'plat');
        $this->join('carta_plat', 'carta.id_carta=carta_plat.id_carta');
        $this->join('plat', 'carta_plat.id_plat = plat.id_plat');
        $this->join('plat_comanda', 'plat_comanda.id_plat=plat.id_plat');
        $this->where('plat_comanda.id_plat_comanda', $id);
        $queryPlats = $this->findAll();


        $this->select('establiment.codi_establiment');
        $this->from('carta', 'plat');
        $this->join('carta_plat', 'carta.id_carta=carta_plat.id_carta');
        $this->join('plat', 'carta_plat.id_plat = plat.id_plat');
        $this->join('categoria_carta', 'categoria_carta.id_carta=carta.id_carta');
        $this->join('categoria', 'categoria.id_categoria = categoria_carta.id_carta');
        $this->join('establiment', 'categoria.codi_establiment = establiment.codi_establiment');
        $this->join('plat_comanda', 'plat_comanda.id_plat=plat.id_plat');
        $this->where('plat_comanda.id_plat_comanda', $id);
        $queryEstabliment = $this->findAll();
        $establiment = "";
        foreach ($queryEstabliment as $row) {
            $establiment = $row;
        }
        $plats = [];

        foreach ($queryPlats as $row) {
            $photos = $this->getFile($establiment["codi_establiment"], "plats", $row["id_plat"]);
            $row["fotos"] = $photos;
            array_push($plats, $row);
        }
        return $plats;
    }
}
