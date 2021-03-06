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

  //Funcion de validacion y registro de CPU en la base de datos

  public function CreateEquipo($data){
    $sql= "SELECT * FROM equipo WHERE equi_serial= '$data[0]' OR equi_type= '$data[1]' OR equi_consecutivo= '$data[2]' OR equi_hostname= '$data[3]' OR equi_atid= '$data[4]' OR equi_oid= '$data[5]' OR equi_cid= '$data[6]' OR equi_nice_screen= '$data[10]' OR equi_nice_super= '$data[11]' OR equi_amadeus_cm= '$data[13]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_equipo= $query->rowCount();

    if($ver_equipo== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
      }elseif($data[7]== "No" AND $data[8]!= "1"){
        $msn= 'Si en el campo OFFICE elegiste la opción "No", en el campo VERSION DE OFFICE debes elegir "Sin versión"';

        return $msn;
        }else{
            try {
              $sql= "INSERT INTO equipo VALUES('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              $query= $this->pdo->prepare($sql);
              $query->execute(array($data[8],$data[9],$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[10],$data[11],$data[12],$data[13],"Sin asignacion"));
              $msn= "La CPU fue guardada exitosamente.";

            } catch (PDOException $e) {
              die($e->getMessage());
            }
            return $msn;
          }
  }

  //Funcion para buscar una CPU determinada en la base de datos

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

  //Funcion para buscar todas las CPU que esten registrados en la base de datos

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

  //Funcion para ver los datos de las CPU que esten registradas en la base de datos para la asignacion

  public function ReadEquipobyAsignacion(){
    try {
      $sql= "SELECT * FROM equipo WHERE equi_estado= 'Sin asignacion' ORDER BY equi_serial ASC";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para ver el detalle de una CPU determinado en la base de datos

  public function DetalleEquipo($detalle){
    try {
      $sql= "SELECT * FROM equipo INNER JOIN equi_version_office ON (equipo.ver_id = equi_version_office.ver_id) INNER JOIN equi_cargo_super ON (equipo.carg_id = equi_cargo_super.carg_id) WHERE equi_serial= '$detalle'";
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
    $sql= "SELECT * FROM equipo WHERE equi_serial= '$data[1]' OR equi_type= '$data[2]' OR equi_consecutivo= '$data[3]' OR equi_hostname= '$data[4]' OR equi_atid= '$data[5]' OR equi_oid= '$data[6]' OR equi_cid= '$data[7]' OR equi_nice_screen= '$data[11]' OR equi_nice_super= '$data[12]' OR equi_amadeus_cm= '$data[14]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_equipo= $query->rowCount();

    if($ver_equipo== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
      }else{
        try {
          $sql= "UPDATE equipo SET equi_serial= '$data[1]', equi_type= '$data[2]', equi_consecutivo= '$data[3]', equi_hostname= '$data[4]', equi_atid= '$data[5]', equi_oid= '$data[6]', equi_cid= '$data[7]', equi_nice_screen= '$data[8]', equi_nice_super= '$data[9]', equi_spector= '$data[10]', equi_amadeus_cm= '$data[11]' WHERE equi_id= :equi_id";
          $query= $this->pdo->prepare($sql);
          $query->bindValue(":equi_id",$data[0]);
          $query->execute();
          $msn= "La CPU se ha actualizado correctamente.";

        } catch (PDOException $e) {
          die($e->getMessage());
        }
        return $msn;
      }
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

  //Funcion para buscar todos las pantallas que esten registradas en la base de datos

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

  //Funcion para ver todas las pantallas que esten registradas en la base de datos para la asignacion

  public function ReadPantallabyAsignacion(){
    try {
      $sql= "SELECT * FROM pantalla WHERE pant_estado= 'Sin asignacion' ORDER BY pant_serial ASC";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_BOTH);

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
    $sql= "SELECT * FROM pantalla WHERE pant_serial= '$data[0]' OR pant_type= '$data[1]' OR pant_consecutivo= '$data[2]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_pantalla= $query->rowCount();

    if($ver_pantalla== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
    }else{
      try {
        $sql= "UPDATE pantalla SET pant_serial= '$data[1]', pant_type= '$data[2]', pant_consecutivo= '$data[3]' WHERE pant_id= :pant_id";
        $query= $this->pdo->prepare($sql);
        $query->bindValue(":pant_id",$data[0]);
        $query->execute();
        $msn= "La pantalla se ha actualizado exitosamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
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

  //Funcion para buscar todos los teclados que esten registrados en la base de datos

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

  //Funcion para ver todos los teclados que esten registrados en la base de datos para la asignacion

  public function ReadTecladobyAsignacion(){
    try {
      $sql= "SELECT * FROM teclado WHERE tec_estado= 'Sin asignacion' ORDER BY tec_serial ASC";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_BOTH);

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
    $sql= "SELECT * FROM teclado WHERE tec_serial= '$data[0]' OR tec_type= '$data[1]' OR tec_consecutivo= '$data[2]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_teclado= $query->rowCount();

    if($ver_teclado== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
    }else{
      try {
        $sql= "UPDATE teclado SET tec_serial= '$data[1]' tec_type= '$data[2]', tec_consecutivo= '$data[3]' WHERE tec_id= :tec_id";
        $query= $this->pdo->prepare($sql);
        $query->bindValue(":tec_id",$data[0]);
        $query->execute();
        $msn= "El teclado se ha actualizado correctamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
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
        $sql= "INSERT INTO hardphone VALUES('',?,?,?,?,?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0],$data[1],$data[2],$data[3],"Sin asignacion"));
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
      $sql= "SELECT * FROM hardphone WHERE hard_serial LIKE ? OR hard_type LIKE ? OR hard_consecutivo LIKE ? OR hard_extension LIKE ? OR hard_estado LIKE ? AND hard_id<> '1' AND hard_id<> '2'";
      $query= $this->pdo->prepare($sql);
      $query->execute(array("%$data%","%$data%","%$data%","%$data%","%$data%"));
      $data= $query->fetchALL(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $data;
  }

  //Funcion para buscar todos los hardphones que estan registrados en la base de datos

  public function ReadHardphone(){
    try {
      $sql= "SELECT * FROM hardphone WHERE hard_id<> '1' AND hard_id<> '2'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para ver todos los harphone que estan registrados en la base de datos para la asignacion

  public function ReadHardphonebyAsignacion(){
    try {
      $sql= "SELECT * FROM hardphone WHERE hard_estado= 'Sin asignacion' ORDER BY hard_id ASC";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para ver el detalle de un hardphone determinado en la base de datos

  public function DetalleHardphone($detalle){
    try {
      $sql= "SELECT * FROM hardphone WHERE hard_serial= '$detalle'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para actualizar los datos de un hardphone determinado en la base de datos

  public function UpdateHardphone($data){
    $sql= "SELECT * FROM hardphone WHERE hard_serial= '$data[0]' OR hard_type= '$data[1]' OR hard_consecutivo= '$data[2]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_harphone= $query->rowCount();

    if($ver_harphone== true){
      $msn= "Verifica los datos ingresados, ya que hay un dato que esta registrado en el sistema.";

      return $msn;
    }else{
      try {
        $sql= "UPDATE hardphone SET hard_serial= '$data[1]', hard_type= '$data[2]', hard_consecutivo= '$data[3]', hard_extension= '$data[4]' WHERE hard_id= :hard_id";
        $query= $this->pdo->prepare($sql);
        $query->bindValue(":hard_id",$data[0]);
        $query->execute();
        $msn= "El hardphone se ha actualizado correctamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  //Funcion para eliminar un hardphone determinado en la base de datos

  public function DeleteHardphone($id){
    $sql= "SELECT * FROM hardphone WHERE hard_id= '$id' AND hard_estado= 'Asignado'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $asignacion= $query->rowCount();

    if($asignacion== true){
      $msn= "El hardphone no se puede eliminar ya que esta asignado a un puesto.";

      return $msn;
    }else{
      try {
        $sql= "DELETE FROM hardphone WHERE hard_id= '$id'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $msn= "El hardphone se ha eliminado correctamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                             ASIGNACION                                                     //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion de validacion y registro asignaciones en la base de datos

  public function CreateAsignacion($data){
    try {
      $sql= "INSERT INTO asignacion VALUES('',?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $query= $this->pdo->prepare($sql);
      $query->execute(array($data[6],$data[7],$data[9],$data[10],$_SESSION["user"]["code"],$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[8],$data[11],$data[12]));
      $msn= "La asignacion guardó exitosamente.";

      $sql= "UPDATE equipo SET equi_estado= 'Asignado' WHERE equi_id= '$data[6]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

      $sql= "UPDATE pantalla SET pant_estado= 'Asignado' WHERE pant_id= '$data[7]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

      $sql= "UPDATE pantalla SET pant_estado= 'Asignado' WHERE pant_consecutivo= '$data[8]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

      $sql= "UPDATE teclado SET tec_estado= 'Asignado' WHERE tec_id= '$data[9]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

      $sql= "UPDATE hardphone SET hard_estado= 'Asignado' WHERE hard_id= '$data[10]' AND hard_id<> '1'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  //Funcion para buscar asignaciones determinadas en la base de datos

  public function SearchAsignacion($data){
    try {
      $sql= "SELECT * FROM asignacion INNER JOIN equipo ON(asignacion.equi_id = equipo.equi_id) INNER JOIN pantalla ON(asignacion.pant_id = pantalla.pant_id) INNER JOIN teclado ON(asignacion.tec_id = teclado.tec_id) INNER JOIN hardphone ON(asignacion.hard_id = hardphone.hard_id) INNER JOIN usuario ON(asignacion.user_id = usuario.user_id) WHERE asig_piso LIKE ? OR asig_oficina LIKE ? OR asig_puesto LIKE ? OR equi_consecutivo LIKE ? OR pant_consecutivo LIKE ? OR asig_seg_pant LIKE ? OR tec_consecutivo LIKE ? OR hard_consecutivo LIKE ? OR user_name LIKE ? OR asig_fecha LIKE ?";
      $query= $this->pdo->prepare($sql);
      $query->execute(array("%$data%","%$data%","%$data%","%$data%","%$data%","%$data%","%$data%","%$data%","%$data%","%$data%"));
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

  //Funcion para ver el detalle de un equipo determinado en la base de datos

  public function DetalleAsignacion($detalle){
    try {
      $sql= "SELECT * FROM asignacion INNER JOIN equipo ON(asignacion.equi_id = equipo.equi_id) INNER JOIN pantalla ON(asignacion.pant_id = pantalla.pant_id) INNER JOIN teclado ON(asignacion.tec_id = teclado.tec_id) INNER JOIN hardphone ON(asignacion.hard_id = hardphone.hard_id) WHERE asig_id= '$detalle'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para acturalizar los datos de una asignacion determinada en la base de datos

  public function UpdateAsignacion($data){
    try {
      $sql= "UPDATE asignacion SET asig_piso= '$data[1]', asig_oficina= '$data[2]', asig_puesto= '$data[3]', asig_lob= '$data[4]', asig_split= '$data[5]', asig_tipo_servicio= '$data[6]', asig_obser= '$data[7]' WHERE asig_id= :asig_id";
      $query= $this->pdo->prepare($sql);
      $query->bindValue("asig_id",$data[0]);
      $query->execute();
      $msn= "La asignacion se ha actualizado correctamente";

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  //Funcion para ver el detalle de un equipo determinado en la base de datos

  public function ReadDeleteAsignacion($detalle){
    try {
      $sql= "SELECT * FROM asignacion INNER JOIN equipo ON(asignacion.equi_id = equipo.equi_id) INNER JOIN pantalla ON(asignacion.pant_id = pantalla.pant_id) INNER JOIN teclado ON(asignacion.tec_id = teclado.tec_id) INNER JOIN hardphone ON(asignacion.hard_id = hardphone.hard_id) WHERE asig_id= '$detalle'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }


  //Funcion para eliminar una asignacion determinada de la base de datos

  public function DeleteAsignacion($data){
    try {
      $sql= "DELETE FROM asignacion WHERE asig_id= :asignacion";
      $query= $this->pdo->prepare($sql);
      $query->bindValue("asignacion",$data[0]);
      $query->execute();
      $msn= "La asignacion fue eliminada correctamente";

      $sql= "UPDATE equipo SET equi_estado= 'Sin asignacion' WHERE equi_consecutivo= '$data[7]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

      $sql= "UPDATE pantalla SET pant_estado= 'Sin asignacion' WHERE pant_consecutivo= '$data[8]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

      $sql= "UPDATE pantalla SET pant_estado= 'Sin asignacion' WHERE pant_consecutivo= '$data[9]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

      $sql= "UPDATE teclado SET tec_estado= 'Sin asignacion' WHERE tec_consecutivo= '$data[10]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

      $sql= "UPDATE hardphone SET hard_estado= 'Sin asignacion' WHERE hard_consecutivo= '$data[11]'";
      $query= $this->pdo->prepare($sql);
      $query->execute();

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                            ADMIN LISTAS                                                    //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion que trae los datos de las versiones de office registradas en la base de datos

  public function ReadVersionOffice(){
    try {
      $sql= "SELECT * FROM equi_version_office";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion que trae los datos de las versiones de office al equipo

  public function ReadVersionOfficebyEqui(){
    try {
      $sql= "SELECT * FROM equi_version_office";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para guardar nuevas versiones de office en la base de datos

  public function CreateVersionOffice($data){
    try {
      $sql= "INSERT INTO equi_version_office VALUES('',?)";
      $query= $this->pdo->prepare($sql);
      $query->execute(array($data[0]));
      $msn= "La version de office fue guardada correctamente.";

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  //Funcion para eliminar las versiones registradas en la base de datos

  public function DeleteVersionOffice($id){
    $sql= "SELECT * FROM equipo WHERE ver_id= '$id'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $id_version= $query->rowCount();

    if($id_version== true){
      $msn= "No se puede eliminar la version ya que cuenta con equipos que la poseen.";

      return $msn;
    }else{
      try {
        $sql= "DELETE FROM equi_version_office WHERE ver_id= '$id'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $msn= "La version se eliminó correctamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  //Funcion que trae los datos de los cargos que estan registrados en la base de datos

  public function ReadCargo(){
    try {
      $sql= "SELECT * FROM equi_cargo_super";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion que trae los datos de los cargos que estan registrados en la base de datos

  public function ReadCargobyEqui(){
    try {
      $sql= "SELECT * FROM equi_cargo_super";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $result= $query->fetchALL(PDO::FETCH_BOTH);

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $result;
  }

  //Funcion para crear nuevos cargos en la base de datos

  public function CreateCargo($data){
    try {
      $sql= "INSERT INTO equi_cargo_super VALUES('',?)";
      $query= $this->pdo->prepare($sql);
      $query->execute(array($data[0]));
      $msn= "El cargo fue creado correctamente.";

    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $msn;
  }

  //Funcion para eliminar los cargos registrados en la base de datos

  public function DeleteCargo($id){
    $sql= "SELECT * FROM equipo WHERE carg_id= '$id'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $id_cargo= $query->rowCount();

    if($id_cargo== true){
      $msn= "No se puede eliminar el cargo ya que cuenta con equipos que poseen el cargo.";

      return $msn;
    }else{
      try {
        $sql= "DELETE FROM equi_cargo_super WHERE carg_id= '$id'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $msn= "El cargo se eliminó correctamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                               PHPEXCEL                                                     //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion para llevar los datos al reporte de excel desde la base de datos

  public function ReporteExcel(){
    try {
      $sql= "SELECT * FROM asignacion INNER JOIN pantalla ON (asignacion.pant_id = pantalla.pant_id) INNER JOIN teclado ON (asignacion.tec_id = teclado.tec_id) INNER JOIN hardphone ON (asignacion.hard_id = hardphone.hard_id) INNER JOIN equipo ON (asignacion.equi_id = equipo.equi_id) INNER JOIN equi_version_office ON (equipo.ver_id = equi_version_office.ver_id) INNER JOIN equi_cargo_super ON (equipo.carg_id = equi_cargo_super.carg_id)";
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
