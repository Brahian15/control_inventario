<?php
session_start();
require_once 'model/conn.model.php';

if(isset($_REQUEST['c'])){

  $controller = strtolower($_REQUEST['c']);
  $action = isset($_REQUEST['a']) ? $_REQUEST['a']: "inicio";

  require_once "controller/$controller.controller.php";
  $controller = ucwords($controller)."controller";

  $controller = new $controller();
  call_user_func(array($controller, $action));
}else{
  $controller = 'admin';
  require_once "controller/$controller.controller.php";
  $controller = ucwords($controller)."controller";
  $controller = new $controller();
  $controller->login();
}
if(isset($_GET["msn"])){
  echo "<script>alert('".$_GET["msn"]."')</script>";
}
?>
