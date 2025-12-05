<?php
namespace App\Kipedreiro\Core;

class ChaveApi{
    private string $chaveAPI;
    public function __construct(){
        $this->chaveAPI = "997ADF04E5D6735917E28883A77845C172000DEE8D13A75666662B700215883E";
    }

    private function buscaChaveAPI(){
        $headers = getallheaders();
        if(!isset($headers["Authorization"])){
            return false;
        }
        $token = explode(' ', $headers['Authorization'] ?? '')[1] ?? null;
        return $token === $this->chaveAPI;
    }

    public function validarChave(){
        if(!$this->buscaChaveAPI()){
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => 'Acesso não autorizado. Chave API inválida.'
            ]);
            exit;
        }
    }
}