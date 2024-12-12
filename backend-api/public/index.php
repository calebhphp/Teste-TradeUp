<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require '../vendor/autoload.php';

use GuzzleHttp\Client;

$BASE_URL = 'https://viacep.com.br/ws/';
header('Content-Type: application/json');

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if (strpos($requestUri, '/api/cep') === 0 && $requestMethod === 'GET') {
    $cep = $_GET['cep'] ?? '';

    if (!preg_match('/^\d{8}$/', $cep)) {
        http_response_code(400);
        echo json_encode(['error' => 'CEP inválido.']);
        exit;
    }

    try {
        $client = new Client([
            'base_uri' => $BASE_URL,
            'timeout' => 5.0,
            'verify' => false,
        ]);

        $response = $client->get("$cep/json/");
        $responseData = json_decode($response->getBody(), true);

        if (isset($responseData['erro']) && $responseData['erro'] === true) {
            http_response_code(404);
            echo json_encode(['error' => 'CEP não encontrado.']);
            exit;
        }

        echo json_encode([
            'cep' => $responseData['cep'],
            'logradouro' => $responseData['logradouro'],
            'complemento' => $responseData['complemento'],
            'bairro' => $responseData['bairro'],
            'localidade' => $responseData['localidade'],
            'uf' => $responseData['uf'],
        ]);
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Erro na requisição.', 'message' => $e->getMessage()]);
    } catch (\Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Erro interno.', 'message' => $e->getMessage()]);
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint não encontrado.']);
}
