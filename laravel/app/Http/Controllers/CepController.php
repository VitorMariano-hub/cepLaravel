<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CepApiService;

class CepController extends Controller
{

    protected $cepApiService;

    public function __construct(CepApiService $cepApiService)
    {
        $this->cepApiService = $cepApiService;
    }

    public function index()
    {

        return view('home');

    }

    public function show(Request $request)
    {
        $search = $request->cep;

        $cep = $this->cepApiService->getCepData($search);

        if (isset($cep['error'])) {
            $error = $cep['error'];
            return view('home', ['error' => $error]);
        }

        return response()->json(['cep' => $cep]);

    }
}
