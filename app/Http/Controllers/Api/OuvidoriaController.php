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
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function ouvidoriaMockup(Request $request){
        try {
            $response = $this->ouvidoriaRepository->pdfMock();

            return response()->json($response);
        } catch (\Exception $e){
            return response()->json(['success' => 0, 'error' => $e->getMessage()]);
        }
    }
}
