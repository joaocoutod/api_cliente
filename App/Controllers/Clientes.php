<?php 
use App\Core\Controller;

class Clientes extends Controller{

    //BUSCA TODOS OS CLIENTES
    public function index(){

        $clienteModel = $this->model("Cliente");

        $cliente = $clienteModel->getClientesAll();

        if(json_encode($cliente, JSON_UNESCAPED_UNICODE) != "null"){
            echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
        }else{
            echo "usuarios não encontrados";
        }
    }

    //BUSCA CLIENTE POR ID
    public function find($id){
        $clienteModel = $this->model("Cliente");

        $cliente = $clienteModel->getClienteId($id);

        if(json_encode($cliente, JSON_UNESCAPED_UNICODE) != "null"){
            echo json_encode($cliente, JSON_UNESCAPED_UNICODE);
        }else{
            echo "usuario não encontrado";
        }
    }


    //INSERE CLIENTE
    public function post(){

        $newCliente = $this->getRequestBody();

        $clienteModel = $this->model("Cliente");
        $clienteModel->nome = $newCliente->nome;
        $clienteModel->idade = $newCliente->idade;
        $clienteModel = $clienteModel->setCliente();

        if($clienteModel){
            http_response_code(208);
            echo json_encode($clienteModel);
        }else{
            http_response_code(500);
            echo json_encode(["error" => "Problemas ao inserir cliente"]);
        }

    }


    //ATUALIZA CLIENTE
    public function put($id){
        $putCliente = $this->getRequestBody();

        $clienteModel = $this->model("Cliente");
        $clienteModel->nome = $putCliente->nome;
        $clienteModel->idade = $putCliente->idade;
        $clienteModel = $clienteModel->putCliente($id);

        if($clienteModel){
            http_response_code(208);
            echo json_encode($clienteModel);
        }else{
            http_response_code(500);
            echo json_encode(["error" => "Problemas ao inserir cliente"]);
        }
        
    }


    //DELETA CLIENTE
    public function delete($id){
        $clienteModel = $this->model("Cliente");
        $cliente = $clienteModel->deleteClienteId($id);
    }
}



?>