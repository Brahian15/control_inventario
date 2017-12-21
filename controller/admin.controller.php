<?php
  require_once 'model/user.model.php';
  require_once 'load.controller.php';
  require_once 'view/assets/PHPExcel/Classes/PHPExcel.php';

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
        $titulo= 'CPU';
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
        $titulo= 'Ver CPU';
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



    public function ReadDeleteAsignacion(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= "Eliminar asignacion";
        require_once 'view/include/header.php';
        $id= $_GET["id"];
        $result= $this->model->ReadDeleteAsignacion($id);
        require_once 'view/modules/admin/deleteAsignacion.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para eliminar una asignacion determinada en el sistema

    public function DeleteAsignacion(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->DeleteAsignacion($data);
        header("Location: ?c=admin&a=ReadAsignacion&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                            ADMIN LISTAS                                                    //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para ver las versiones de office registradas en el sistema

    public function ListaOffice(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= "Lista de version de office";
        require_once 'view/include/header.php';
        $result= $this->model->ReadVersionOffice();
        require_once 'view/modules/admin/listaOffice.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar nuevas versiones de office en el sistema

    public function CreateVersionOffice(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->CreateVersionOffice($data);
        header("Location: ?c=admin&a=ListaOffice&msn=$result");
      }
    }

    //Funcion para eliminar las versiones registradas en el sistema

    public function DeleteVersionOffice(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $id= $_GET["id"];
        $result= $this->model->DeleteVersionOffice($id);
        header("Location: ?c=admin&a=ListaOffice&msn=$result");
      }
    }

    //Funcion para ver los cargos registrados en el sistema

    public function ListaCargo(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $titulo= "Lista de los cargos";
        require_once 'view/include/header.php';
        $result= $this->model->ReadCargo();
        require_once 'view/modules/admin/listaCargo.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar nuevos cargos en el sistema

    public function CreateCargo(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $data= $_POST["data"];
        $result= $this->model->CreateCargo($data);
        header("Location: ?c=admin&a=ListaCargo&msn=$result");
      }
    }

    //Funcion para eliminar los cargos registrados en el sistema

    public function DeleteCargo(){
      if(!isset($_SESSION["user"])){
        header("Location: ?c=admin&a=login");
      }else{
        $id= $_GET["id"];
        $result= $this->model->DeleteCargo($id);
        header("Location: ?c=admin&a=ListaCargo&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                              PHPEXCEL                                                      //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para generar el reporte de excel de todas las asignaciones

    public function ReporteExcel(){

      $result= $this->model->ReporteExcel();

      error_reporting(E_ALL);
      ini_set('display_errors', TRUE);
      ini_set('display_startup_errors', TRUE);
      date_default_timezone_set('America/Bogota');

      $objPHPExcel = new PHPExcel();

      if (PHP_SAPI == 'cli')
        die('This example should only be run from a Web Browser');

      $objPHPExcel->getProperties()->setCreator("Control_inventario")
                    ->setLastModifiedBy("Control_inventario")
                    ->setTitle("Reporte de inventario")
                    ->setSubject("Reporte de inventario")
                    ->setDescription("Este es el reporte del inventario de IT")
                    ->setKeywords("Reporte inventario IT")
                    ->setCategory("Reporte excel");

      $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A1', 'Piso')
                  ->setCellValue('B1', 'Oficina')
                  ->setCellValue('C1', 'Puesto')
                  ->setCellValue('D1', 'Extensión')
                  ->setCellValue('E1', 'Hostname')
                  ->setCellValue('F1', 'LOB')
                  ->setCellValue('G1', 'Split')
                  ->setCellValue('H1', 'Tipo servicio')
                  ->setCellValue('I1', 'ATID')
                  ->setCellValue('J1', 'OID')
                  ->setCellValue('K1', 'CID')
                  ->setCellValue('L1', 'Office')
                  ->setCellValue('M1', 'Version Office')
                  ->setCellValue('N1', 'CMS Supervisor')
                  ->setCellValue('O1', 'Supervisor')
                  ->setCellValue('P1', 'NICE ScreenAgent')
                  ->setCellValue('Q1', 'NICE')
                  ->setCellValue('R1', 'Spector360')
                  ->setCellValue('S1', 'Amadeus CM')
                  ->setCellValue('T1', 'Consecutivo CPU')
                  ->setCellValue('U1', 'Consecutivo Pantalla')
                  ->setCellValue('V1', 'Consecutivo teclado')
                  ->setCellValue('W1', 'Consecutivo hardphone')
                  ->setCellValue('X1', 'Observaciones');

      $i = 2;
      foreach($result as $data){
        $objPHPExcel->setActiveSheetIndex(0)
                    ->SetCellValue("A$i", $data->asig_piso)
                    ->SetCellValue("B$i", $data->asig_oficina)
                    ->SetCellValue("C$i", $data->asig_puesto)
                    ->SetCellValue("D$i", $data->hard_extension)
                    ->SetCellValue("E$i", $data->equi_hostname)
                    ->SetCellValue("F$i", $data->asig_lob)
                    ->SetCellValue("G$i", $data->asig_split)
                    ->SetCellValue("H$i", $data->asig_tipo_servicio)
                    ->SetCellValue("I$i", $data->equi_atid)
                    ->SetCellValue("J$i", $data->equi_oid)
                    ->SetCellValue("K$i", $data->equi_cid)
                    ->SetCellValue("L$i", $data->equi_office)
                    ->SetCellValue("M$i", $data->ver_nom)
                    ->SetCellValue("N$i", $data->equi_super)
                    ->SetCellValue("O$i", $data->carg_nom)
                    ->SetCellValue("P$i", $data->equi_nice_screen)
                    ->SetCellValue("Q$i", $data->equi_nice_super)
                    ->SetCellValue("R$i", $data->equi_spector)
                    ->SetCellValue("S$i", $data->equi_amadeus_cm)
                    ->SetCellValue("T$i", $data->equi_consecutivo)
                    ->SetCellValue("U$i", $data->pant_consecutivo)
                    ->SetCellValue("V$i", $data->tec_consecutivo)
                    ->SetCellValue("W$i", $data->hard_consecutivo)
                    ->SetCellValue("X$i", $data->asig_obser);

      $i++;
      }

      $objPHPExcel->getActiveSheet()->setTitle('Reporte de inventario');

      $objPHPExcel->setActiveSheetIndex(0);

      // Redirect output to a client’s web browser (Excel2007)
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="ReporteInventario.xlsx"');
      header('Cache-Control: max-age=0');
      // If you're serving to IE 9, then the following may be needed
      header('Cache-Control: max-age=1');

      // If you're serving to IE over SSL, then the following may be needed
      header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
      header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      header ('Pragma: public'); // HTTP/1.0

      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
      $objWriter->save('php://output');
      exit;

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
