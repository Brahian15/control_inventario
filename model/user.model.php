<?php

class UserModel{

  private $pdo;
  public function __CONSTRUCT(){

    try{
      $this->pdo = DataBase::connect();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
      die($e->getMessage());
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                              REGISTRO                                                      //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion para guardar datos del usuario en la base de datos

  public function CreateUser($data){
    $sql= "SELECT * FROM usuario WHERE user_email= :email";
    $query= $this->pdo->prepare($sql);
    $query->bindValue(":email",$data[0]);
    $query->execute();
    $valid_email= $query->rowCount();

    if($valid_email==true){
      $msn= "El correo que has ingresado ya esta registrado en el sistema.";

      return $msn;
    }else{
      try {
      $sql= "INSERT INTO usuario VALUES (?,?,?,?,?)";
      $query= $this->pdo->prepare($sql);
      $query->execute(array($data[4],$data[2],$data[1],$data[0],$data[3]));
      $msn= 'El usuario se ha guardado exitosamente';

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  //Funcion para cargar los datos de los roles de la base de datos

  public function ReadRol(){
    try {
      $sql= "SELECT * FROM rol";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchAll(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                                LOGIN                                                       //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion para leer los correos que estan registrados en la base de datos

  public function ReadEmail($data){
    try {
      $sql= "SELECT * FROM usuario WHERE user_email= ?";
      $query= $this->pdo->prepare($sql);
      $query->execute(array($data[0]));
      $result= $query->fetch(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                                 CPU                                                        //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //funcion de validacion y registro de CPU en la base de datos

  public function CreateEquipo($data){
    $sql= "SELECT * FROM equipo WHERE equi_serial= '$data[0]' OR equi_type= '$data[1]' OR equi_consecutivo= '$data[2]' OR equi_hostname= '$data[3]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_equipo= $query->rowCount();

    if($ver_equipo== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
    }else {
      try {
        $sql= "INSERT INTO equipo VALUES('',?,?,?,?,?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0],$data[1],$data[2],$data[3],"Sin asignacion"));
        $msn= "La CPU fue guardada exitosamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  //Funcion para buscar una CPU determinado en la base de datos

  public function SearchEquipo($data){
    try {
      $sql= "SELECT * FROM equipo WHERE equi_serial LIKE ? OR equi_type LIKE ? OR equi_consecutivo LIKE ? OR equi_hostname LIKE ? OR equi_estado LIKE ?";
      $query= $this->pdo->prepare($sql);
      $query->execute(array("%$data%","%$data%","%$data%","%$data%","%$data%"));
      $data= $query->fetchAll(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $data;
  }

  //Funcion para buscar todos los de las CPU que esten registrados en la base de datos

  public function ReadEquipo(){
    try {
      $sql= "SELECT * FROM equipo";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para ver el detalle de una CPU determinado en la base de datos

  public function DetalleEquipo($detalle){
    try {
      $sql= "SELECT * FROM equipo WHERE equi_serial= '$detalle'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para actualizar los datos de una CPU determinado en la base de datos

  public function UpdateEquipo($data){
    try {
      $sql= "UPDATE equipo SET equi_type= '$data[1]', equi_consecutivo= '$data[2]', equi_hostname= '$data[3]' WHERE equi_serial= :equi_id";
      $query= $this->pdo->prepare($sql);
      $query->bindValue(":equi_id",$data[0]);
      $query->execute();
      $msn= "La CPU se ha actualizado correctamente.";

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  //Funcion para eliminar una CPU determinado en la base de datos

  public function DeleteEquipo($id){
    $sql= "SELECT * FROM equipo WHERE equi_id= '$id' AND equi_estado= 'Asignado'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $asignacion= $query->rowCount();

    if($asignacion== true){
      $msn= "La CPU no se puede eliminar ya que esta asignado a un puesto.";

      return $msn;
    }else{
      try {
        $sql= "DELETE FROM equipo WHERE equi_id='$id'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $msn= "La CPU se ha eliminado correctamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                              PANTALLA                                                      //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion de validacion y registro de pantallas en la base de datos

  public function CreatePantalla($data){
    $sql= "SELECT * FROM pantalla WHERE pant_serial= '$data[0]' OR pant_type= '$data[1]' OR pant_consecutivo= '$data[2]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_pantalla= $query->rowCount();

    if($ver_pantalla== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
    }else{
      try {
        $sql= "INSERT INTO pantalla VALUES('',?,?,?,?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0],$data[1],$data[2],"Sin asignacion"));
        $msn= "La pantalla fue guardada exitosamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;

    }
  }

  //Funcion para buscar una pantalla determinada en la base de datos

  public function SearchPantalla($data){
    try {
      $sql= "SELECT * FROM pantalla WHERE pant_serial LIKE ? OR pant_type LIKE ? OR pant_consecutivo LIKE ? OR pant_estado LIKE ?";
      $query= $this->pdo->prepare($sql);
      $query->execute(array("%$data%","%$data%","%$data%","%$data%"));
      $data= $query->fetchAll(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $data;
  }

  //Funcion para buscar todos las pantallas que este registradas en el sistema

  public function ReadPantalla(){
    try {
      $sql= "SELECT * FROM pantalla";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchAll(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para ver el detalle de un equipo determinado en la base de datos

  public function DetallePantalla($detalle){
    try {
      $sql= "SELECT * FROM pantalla WHERE pant_serial= '$detalle'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para actuzalizar la pantalla en la base de datos

  public function UpdatePantalla($data){
    try {
      $sql= "UPDATE pantalla SET pant_type= '$data[1]', pant_consecutivo= '$data[2]' WHERE pant_serial= :pant_id";
      $query= $this->pdo->prepare($sql);
      $query->bindValue(":pant_id",$data[0]);
      $query->execute();
      $msn= "La pantalla se ha actualizado exitosamente.";

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  //Funcion para eliminar una pantalla determinada en la base de datos

  public function DeletePantalla($id){
    $sql= "SELECT * FROM pantalla WHERE pant_id= '$id' AND pant_estado= 'Asignado'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $asignacion= $query->rowCount();

    if($asignacion== true){
      $msn= "La CPU no se puede eliminar ya que esta asignado a un puesto.";

      return $msn;
    }else {
      try {
        $sql= "DELETE FROM pantalla WHERE pant_id= '$id'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $msn= "La pantalla se ha eliminado correctamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                              TECLADO                                                       //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion de validacion y registro de teclados en la base de datos

  public function CreateTeclado($data){
    $sql= "SELECT * FROM teclado WHERE tec_serial= '$data[0]' OR tec_type= '$data[1]' OR tec_consecutivo= '$data[2]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_teclado= $query->rowCount();

    if($ver_teclado== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
    }else{
      try {
        $sql= "INSERT INTO teclado VALUES('',?,?,?,?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0],$data[1],$data[2],"Sin asignacion"));
        $msn= "El teclado fue guardado exitosamente";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  //Funcion para buscar un teclado determinado en la base de datos

  public function SearchTeclado($data){
    try {
      $sql= "SELECT * FROM teclado WHERE tec_serial LIKE ? OR tec_type LIKE ? OR tec_consecutivo LIKE ? OR tec_estado LIKE ?";
      $query= $this->pdo->prepare($sql);
      $query->execute(array("%$data%","%$data%","%$data%","%$data%"));
      $data= $query->fetchALL(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $data;
  }

  //Funcion para buscar todos los teclados registrados en la base de datos

  public function ReadTeclado(){
    try {
      $sql= "SELECT * FROM teclado";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para ver el detalle de un teclado determinado en la base de datos

  public function DetalleTeclado($detalle){
    try {
      $sql= "SELECT * FROM teclado WHERE tec_serial= '$detalle'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Function para actualizar los datos de un teclado determinado en la base de datos

  public function UpdateTeclado($data){
    try {
      $sql= "UPDATE teclado SET tec_type= '$data[1]', tec_consecutivo= '$data[2]' WHERE tec_serial= :tec_id";
      $query= $this->pdo->prepare($sql);
      $query->bindValue(":tec_id",$data[0]);
      $query->execute();
      $msn= "El teclado se ha actualizado correctamente.";

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  //Funcion para eliminar un teclado determinado en la base de datos

  public function DeleteTeclado($id){
    $sql= "SELECT * FROM teclado WHERE tec_id= '$id' AND tec_estado= 'Asignado'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $asignacion= $query->rowCount();

    if($asignacion== true){
      $msn= "El teclado no se puede eliminar ya que esta asignado a un puesto.";

      return $msn;
    }else{
      try {
        $sql= "DELETE FROM teclado WHERE tec_id= '$id'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $msn= "El teclado se ha eliminado correctamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                             HARDPHONE                                                      //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion de validacion y registro hardphones en la base de datos

  public function CreateHardphone($data){
    $sql= "SELECT * FROM hardphone WHERE hard_serial= '$data[0]' OR hard_type= '$data[1]' OR hard_consecutivo= '$data[2]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_harphone= $query->rowCount();

    if($ver_harphone== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
    }else{
      try {
        $sql= "INSERT INTO hardphone VALUES('',?,?,?,?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0],$data[1],$data[2],"Sin asignacion"));
        $msn= "El hardphone fue guardado exitosamente";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  //Funcion para buscar un hardphone determinado en la base de datos

  public function SearchHardphone($data){
    try {
      $sql= "SELECT * FROM hardphone WHERE hard_serial LIKE ? OR hard_type LIKE ? OR hard_consecutivo LIKE ? OR hard_estado LIKE ?";
      $query= $this->pdo->prepare($sql);
      $query->execute(array("%$data%","%$data%","%$data%","%$data%"));
      $data= $query->fetchALL(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $data;
  }

  //Funcion para buscar todos los hardphones registrados en la base de datos

  public function ReadHardphone(){
    try {
      $sql= "SELECT * FROM hardphone";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                             ASIGNACION                                                     //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion de validacion y registro asignaciones en la base de datos

  public function CreateAsignacion($data){
    try {
      $sql= "INSERT INTO asignacion VALUES('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $query= $this->pdo->prepare($sql);
      $query->execute(array($data[18],$data[19],$data[20],$data[21],$_SESSION["user"]["code"],$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],$data[12],$data[13],$data[14],$data[15],$data[16],$data[17],$data[22],$data[23]));
      $msn= "La asignacion guardó exitosamente.";

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  //Funcion para buscar asignaciones determinadas en la base de datos

  public function SearchAsignacion($data){
    try {
      $sql= "SELECT * FROM asignacion INNER JOIN equipo ON(asignacion.equi_id = equipo.equi_id) INNER JOIN pantalla ON(asignacion.pant_id = pantalla.pant_id) INNER JOIN teclado ON(asignacion.tec_id = teclado.tec_id) INNER JOIN hardphone ON(asignacion.hard_id = hardphone.hard_id) INNER JOIN usuario ON(asignacion.user_id = usuario.user_id) WHERE asig_piso LIKE ? OR asig_oficina LIKE ? OR asig_puesto LIKE ? OR equi_serial LIKE ? OR pant_serial LIKE ? OR tec_serial LIKE ? OR hard_serial LIKE ? OR user_name LIKE ? OR asig_fecha LIKE ?";
      $query= $this->pdo->prepare($sql);
      $query->execute(array("%$data%","%$data%","%$data%","%$data%","%$data%","%$data%","%$data%","%$data%","%$data%"));
      $data= $query->fetchALL(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $data;
  }

  //Funcion para buscar todas las asignaciones registradas en la base de datos

  public function ReadAsignacion(){
    try {
      $sql= "SELECT * FROM asignacion INNER JOIN equipo ON(asignacion.equi_id = equipo.equi_id) INNER JOIN pantalla ON(asignacion.pant_id = pantalla.pant_id) INNER JOIN teclado ON(asignacion.tec_id = teclado.tec_id) INNER JOIN hardphone ON(asignacion.hard_id = hardphone.hard_id) INNER JOIN usuario ON(asignacion.user_id = usuario.user_id)";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                            CERRAR SESION                                                   //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion para cerrar la sesion del usuario

  public function __DESTRUCT(){
    try {

      DataBase::disconnet();

    } catch (PDOException $e) {
      die($e->getMessage());
    }

  }

}
 ?>
