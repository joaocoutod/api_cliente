<?php

include_once("../App/Core/Controller.php");
include_once("../App/Core/Router.php");

header("Content-type: application/json");
new App\Core\Router();

?>