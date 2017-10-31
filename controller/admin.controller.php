<?php
  require_once 'model/user.model.php';

  class AdminController{

    private $model;

    public function __CONSTRUCT(){
      $this->model = new UserModel();
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
