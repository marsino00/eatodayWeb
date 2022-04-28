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

    public function getPlatbyIdCarta($id = null)
    {
        $this->select('plat.id_plat,plat.nom,plat.descripcio_breu,plat.descripcio_detallada,plat.preu');
        $this->from('carta', 'plat');
        $this->join('carta_plat', 'carta.id_carta=carta_plat.id_carta');
        $this->join('plat', 'carta_plat.id_plat = plat.id_plat');
        $this->where('carta.id_carta', $id);
        $queryPlats = $this->findAll();
        $plats = [];

        foreach ($queryPlats as $row) {
            $photos = $this->getFile($row["id_plat"], "plats");
            $row["fotos"] = $photos;
            array_push($plats, $row);
        }
        return $plats;
    }
}
