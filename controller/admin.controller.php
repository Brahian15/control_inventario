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

    //Funcion de carga del formulario de registro de usuarios

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
      if(isset($_SESSION["user"])){
        header("Location: ?c=admin&a=dashboard");
      }else{
        $titulo = 'Inicio de sesion';
        require_once 'view/include/header.php';
        require_once 'view/modules/login.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion de inicio de sesion y creacion de variables de sesion

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
    //                                                 CPU                                                        //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion cargar el formulario de registro de las CPU en el sistema

    public function Equipo(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Equipo';
        require_once 'view/include/header.php';
        require_once 'view/modules/admin/equipo.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para guardar las CPU en el sistema

    public function CreateEquipo(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->CreateEquipo($data);
        header("Location: ?c=admin&a=Equipo&msn=$result");
      }
    }

    //Funcion de pagina principal y de carga de datos de las CPU registradas en el sistema

    public function dashboard(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Ver equipos';
        require_once 'view/include/header.php';
        $result= $this->model->ReadEquipo();
        require_once 'view/modules/admin/readEquipo.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para ver los datos de una CPU determinada en el sistema

    public function DetalleEquipo(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= "Detalle del equipo";
        require_once 'view/include/header.php';
        $detalle= $_GET['detalle'];
        $result= $this->model->DetalleEquipo($detalle);
        require_once 'view/modules/admin/detalleEquipo.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para actualizar los datos de una CPU determinada en el sistema

    public function UpdateEquipo(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->UpdateEquipo($data);
        header("Location: ?c=admin&a=dashboard&msn=$result");
      }
    }

    //Funcion para eliminar una CPU determinada en el sistema

    public function DeleteEquipo(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $id= $_GET['id'];
        $result= $this->model->DeleteEquipo($id);
        header("Location: ?c=admin&a=dashboard&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                               PANTALLA                                                     //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para cargar el formulario de registro de pantallas en el sistema

    public function Pantalla(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Pantalla';
        require_once 'view/include/header.php';
        require_once 'view/modules/admin/pantalla.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para guardar pantallas en el sistema

    public function CreatePantalla(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->CreatePantalla($data);
        header("Location: ?c=admin&a=Pantalla&msn=$result");
      }
    }

    //Funcion para cargar las pantallas que estan registradas en el sistema

    public function ReadPantalla(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Ver pantalla';
        require_once 'view/include/header.php';
        $result= $this->model->ReadPantalla();
        require_once 'view/modules/admin/readPantalla.php';
        require_once 'view/include/footer.php';
      }
    }

    //Function para ver los datos de un equipo determinado en el sistema

    public function DetallePantalla(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= "Detalle de la pantalla";
        require_once 'view/include/header.php';
        $detalle= $_GET['detalle'];
        $result= $this->model->DetallePantalla($detalle);
        require_once 'view/modules/admin/detallePantalla.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para actualizar los datos de una pantalla determinada en el sistema

    public function UpdatePantalla(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST['data'];
        $result= $this->model->UpdatePantalla($data);
        header("Location: ?c=admin&a=ReadPantalla&msn=$result");
      }
    }

    //Funcion para eliminar una pantalla determinada en el sistema

    public function DeletePantalla(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $id= $_GET['id'];
        $result= $this->model->DeletePantalla($id);
        header("Location: ?c=admin&a=ReadPantalla&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                               TECLADO                                                      //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para cargar el formulario de registro de teclados en el sistema

    public function Teclado(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Teclado';
        require_once 'view/include/header.php';
        require_once 'view/modules/admin/teclado.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para guadar teclados en el Sistema

    public function CreateTeclado(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->CreateTeclado($data);
        header("Location: ?c=admin&a=Teclado&msn=$result");
      }
    }

    //Funcion para cargar los teclados que estan registados en el sistema

    public function ReadTeclado(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Ver teclado';
        require_once 'view/include/header.php';
        $result= $this->model->ReadTeclado();
        require_once 'view/modules/admin/readTeclado.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para ver los datos de un teclado determinado en el sistema

    public function DetalleTeclado(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo="Detalle del teclado";
        require_once 'view/include/header.php';
        $detalle= $_GET['detalle'];
        $result= $this->model->DetalleTeclado($detalle);
        require_once 'view/modules/admin/detalleTeclado.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para actualizar los datos de un teclado determinado en el sistema

    public function UpdateTeclado(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->UpdateTeclado($data);
        header("Location: ?c=admin&a=ReadTeclado&msn=$result");
      }
    }

    //Funcion para eliminar un teclado determinado en el sistema

    public function DeleteTeclado(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $id= $_GET['id'];
        $result= $this->model->DeleteTeclado($id);
        header("Location: ?c=admin&a=ReadTeclado&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                              HARDPHONE                                                     //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para cargar el formulario de registro de hardphone

    public function Hardphone(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Hardphone';
        require_once 'view/include/header.php';
        require_once 'view/modules/admin/hardphone.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para guardar harphones en el sistema

    public function CreateHardphone(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->CreateHardphone($data);
        header("Location: ?c=admin&a=Hardphone&msn=$result");
      }
    }

    //Funcion para cargar los hardphone que estan registrados en el sistema

    public function ReadHardphone(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Ver hardphone';
        require_once 'view/include/header.php';
        $result= $this->model->ReadHardphone();
        require_once 'view/modules/admin/readHardphone.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para ver los datos de un hardphone determinado en el sistema

    public function DetalleHardphone(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= "Detalle del hardphone";
        require_once 'view/include/header.php';
        $detalle= $_GET['detalle'];
        $result= $this->model->DetalleHardphone($detalle);
        require_once 'view/modules/admin/detalleHardphone.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para actualizar los datos de un hardphone determinado en el sistema

    public function UpdateHardphone(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->UpdateHardphone($data);
        header("Location: ?c=admin&a=ReadHardphone&msn=$result");
      }
    }

    //Funcion para eliminar un hardphone determinado en el sistema

    public function DeleteHardphone(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $id= $_GET["id"];
        $result= $this->model->DeleteHardphone($id);
        header("Location: ?c=admin&a=ReadHardphone&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                             ASIGNACION                                                     //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para cargar el formulario de registro de asignacion

    public function Asignacion(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Asignacion';
        require_once 'view/include/header.php';
        require_once 'view/modules/admin/asignacion.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para guardar asignaciones en el sistema

    public function CreateAsignacion(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->CreateAsignacion($data);
        header("Location: ?c=admin&a=Asignacion&msn=$result");
      }
    }

    //Funcion para cargar las asignaciones que estan registradas en el sistema

    public function ReadAsignacion(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= 'Ver asignacion';
        require_once 'view/include/header.php';
        $result= $this->model->ReadAsignacion();
        require_once 'view/modules/admin/readAsignacion.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para ver los datos de un equipo determinado en el sistema

    public function DetalleAsignacion(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= "Detalle de la asignacion";
        require_once 'view/include/header.php';
        $detalle= $_GET["detalle"];
        $result= $this->model->DetalleAsignacion($detalle);
        require_once 'view/modules/admin/detalleAsignacion.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para actualizar los datos de una asignacion determinada en el sistema

    public function UpdateAsignacion(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->UpdateAsignacion($data);
        header("Location: ?c=admin&a=ReadAsignacion&msn=$result");
      }
    }

    //Funcion para eliminar una asignacion determinada en el sistema

    public function DeleteAsignacion(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $id= $_GET["id"];
        $result= $this->model->DeleteAsignacion($id);
        header("Location: ?c=admin&a=ReadAsignacion&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                            CERRAR SESION                                                   //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para cerrar sesion

    public function logout(){
      session_destroy();
      header("Location: ?c=admin&a=login");
    }

  }
 ?>
