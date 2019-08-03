<?php

namespace App\Http\Controllers\Api;

use App\Repositories\OuvidoriaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OuvidoriaController extends Controller
{
    private $ouvidoriaRepository;

    public function __construct(OuvidoriaRepository $ouvidoriaRepository)
    {
        $this->ouvidoriaRepository = $ouvidoriaRepository;
    }

    public function ouvidoria(Request $request){
        return ['success' => 1];
    }

    /**
     * @param Request $request
     */
    public function ouvidoriaMockup(Request $request){
        $response = $this->ouvidoriaRepository->pdfMock();

        return $response;
    }
}
