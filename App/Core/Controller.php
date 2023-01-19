<?php

namespace App\Core;

class Controller{

    public function model($model){
        include_once("../App/Models/". $model .".php");
        return new $model;
    }


    public function getRequestBody(){
        $json = file_get_contents("php://input");
        $obj = json_decode($json);


        return $obj;    
    }

}

?>