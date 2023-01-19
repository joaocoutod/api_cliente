<?php

include_once("../App/Core/Model.php");

use App\Core\Model;

class Cliente{

    public $id;
    public $nome;
    public $idade;

    //index
    public function getClientesAll(){

        $sql = "SELECT * FROM clientes";

        $stmt = Model::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->RowCount() > 0){
            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ); 
            return $resultado;
        }else{
            return null;
        }

    }

    //find
    public function getClienteId($id){
        $sql = "SELECT * FROM clientes where id = ?";

        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        
        if ($stmt->execute()) {
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);

            if(!$resultado){
                return null;
            }

            $this->id = $resultado->id;
            $this->nome = $resultado->nome;
            $this->idade = $resultado->idade;

            return $this;
            

            
        }
    }

    //post
    public function setCliente(){
        $sql = "INSERT INTO clientes(nome, idade) VALUES(?,?)";

        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->nome);
        $stmt->bindValue(2, $this->idade);
        
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
            return null;
        }else{
            return $this;
        }
    }

    //put
    public function putCliente($id){
        $sql = "UPDATE clientes SET nome = ?, idade = ?  WHERE id = ?";

        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->nome);
        $stmt->bindValue(2, $this->idade);
        $stmt->bindValue(3, $id);
        $stmt->execute();

        if($stmt->RowCount() > 0){
            $this->id = $id;
            return $this;
        }else{
            echo "Erro ao atualizar cliente";
        }
    }


    //delete
    public function deleteClienteID($id){
        $sql = "DELETE FROM clientes WHERE id = ?";

        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        
        if($stmt->RowCount() > 0){
            echo "Cliente ($id) foi excluido com sucesso";
        }else{
            echo "usuario ($id) não encontrado";
        }
    }

}

?>