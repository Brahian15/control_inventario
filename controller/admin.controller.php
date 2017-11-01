<?php
  require_once 'model/user.model.php';
  require_once 'load.controller.php';
  require_once 'view/assets/random.php';

  class AdminController{

    private $model;
    private $load;

    public function __CONSTRUCT(){
      $this->model = new UserModel();
      $this->load = new loadController();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                              REGISTRO                                                     //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function register(){
      $titulo = 'Registro';
      require_once 'view/include/header.php';
      require_once 'view/modules/registro.php';
      require_once 'view/include/footer.php';
    }

    public function CreateUser(){
      $data= $_POST["data"];
      $data[4]= "USU-".date('Ymd').'-'.date('hms');
      $result= $this->model->CreateUser($data);
      header("Location: registro?msn=$result");
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                                LOGIN                                                       //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Vista principal del sistema

    public function login(){
      $titulo = 'Inicio de sesion';
      require_once 'view/include/header.php';
      require_once 'view/modules/login.php';
      require_once 'view/include/footer.php';
    }


  }
 ?>
