<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PlatComandaModel;

class PDFController extends BaseController
{

    /**
     * Controlador que a partir de la llibreria MPDF retorna la vista d'un pdf a partir d'un html.
     */
    public function index($id = null)
    {
        $model = new PlatComandaModel();

        $data['comanda'] = $model->getPlatComandabyIdComanda($id);
        // dd($data['comanda']);
        $html = view('pdf/view_pdf', $data);

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        /**
         * Show in browser
         */
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('demo_pdf.pdf', 'I'); // opens in browser

    }
}
