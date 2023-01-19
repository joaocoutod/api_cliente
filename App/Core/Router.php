<?php

namespace App\Core;

class Router{

    private $controller;
    private $method;
    private $controllerMethod;
    private $params = [];


    public function __construct(){

        $url = $this->parseUrl();

        /**
         * verifica se o nome passado na url 
         * se é uma classe dentro do controllers
         */
        if(file_exists("../App/Controllers/". ucfirst($url[1]) .".php")){
            $this->controller = $url[1];
        }else if(empty($url[1])){
            echo "Api de clientes";
            exit;
        }else{
            echo json_encode(["error" => "Recurso não encontrado"]);
            exit;
        }


        /**
         * 
         * se o nome passado na url existir, vai ser executado
         */
        include_once("../App/Controllers/". ucfirst($this->controller) .".php");

        $this->controller = new $this->controller;
        $this->method = $_SERVER["REQUEST_METHOD"];

        switch ($this->method) {
            case 'GET':
                if(isset($url[2])){
                    $this->controllerMethod = "find";
                    $this->params = [$url[2]];
                }else{
                    $this->controllerMethod = "index";
                }
                break;
            
            case "POST":
                $this->controllerMethod = "post";
                break; 
                
            case "PUT":
                $this->controllerMethod = "put";
                if(isset($url[2]) && is_numeric($url[2])){
                    $this->params = [$url[2]];
                }else{
                    http_response_code(400);
                    echo json_encode(["erro" => "É necessário informar um id"]);
                    exit;
                }
                break;

            case "DELETE":
                $this->controllerMethod = "delete";
                if(isset($url[2]) && is_numeric($url[2])){
                    $this->params = [$url[2]];
                }else{
                    http_response_code(400);
                    echo json_encode(["erro" => "É necessário informar um id"]);
                    exit;
                }
                break;
                
            default:
                echo "Método não suportado";
                exit;
                break;
        }

        call_user_func_array([$this->controller, $this->controllerMethod], $this->params);
    }
    
    /**
     * separa a url pela barra
     */
    public function parseUrl(){
        return explode("/", $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
    }

}

?>