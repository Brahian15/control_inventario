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

    //Funcion de la vista del registro

    public function register(){
      $titulo = 'Registro';
      require_once 'view/include/header.php';
      require_once 'view/modules/registro.php';
      require_once 'view/include/footer.php';
    }

    //Funcion para crear usuarios en el sistema

    public function CreateUser(){
      $data= $_POST["data"];
      $data[4]= "USU-".date('Ymd').'-'.date('hms');
      $result= $this->model->CreateUser($data);
      header("Location: ?c=admin&a=register&msn=$result");
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

    //Funcion para iniciar sesion

    public function UserLogin(){
      $data[0]= $_POST["email"];
      $data[1]= $_POST["pass"];
      $UserData= $this->model->ReadEmail($data);

      if($UserData["user_pass"]==$data[1]){
        $return = array(true,"Bienvenido al Sistema");

        //Variables de sesion
        $_SESSION["user"]["code"]= $UserData["user_id"];
        $_SESSION["user"]["name"]= $UserData["user_name"];
        $_SESSION["user"]["email"]= $UserData["user_email"];
      }else{
        $return = array(false,"El correo o la contraseña no son los correctos.");
      }
      echo json_encode($return);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                       "algo que no se que es"                                              //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function dashboard(){
      $titulo= "Principal";
      require_once 'view/include/header.php';
      require_once 'view/modules/admin/principal.php';
      require_once 'view/include/footer.php';
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                                EQUIPO                                                      //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function Equipo(){
      $titulo= "Equipo";
      require_once "view/include/header.php";
      require_once "view/modules/admin/equipo.php";
      require_once "view/include/footer.php";
    }


  }
 ?>
