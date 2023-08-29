<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;

class CepApiService
{
    public function getCepData($cep)
    {
        try {

            $url = env('GITHUB_API_URL') . "{$cep}/json";

            $options = array(
                'http' => array(
                    'method' => 'GET',
                    )
                );

            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            if (json_decode($response)) {

                $data = json_decode($response, true);

                if (isset($data['erro']) && $data['erro'] === true) {
                    return ['error' => 'endereço não encontrado.'];
                } else {
                    return $data;
                }
            }

        } catch (\Exception $e) {
            Log::error('Erro na API do ViaCep: ' . $e->getMessage());

            return ['error' => 'Ocorreu um erro na solicitação.'];
        }
    }
}
