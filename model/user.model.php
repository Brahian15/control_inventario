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

  //Funcion para guardar datos del usuario

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

  //Funcion para cargar los datos de los roles

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
  //                                               EQUIPOS                                                      //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Esta funcion nos va a servir para guardar los equipos que esten registrados

  public function CreateEquipo($data){
    $sql= "SELECT * FROM equipo WHERE equi_serial= '$data[0]' OR equi_type= '$data[1]' OR equi_consecutivo= '$data[2]' OR equi_hostname= '$data[3]'";
    $query= $this->pdo->prepare($sql);
    $query->execute();
    $ver_equipos= $query->rowCount();

    if($ver_equipos==true){
      $msn= "Verifica los datos ingresado, ya que hay un dato que ya esta registrado en el sistema.";

      return $msn;
    }else {
      try {
        $sql= "INSERT INTO equipo VALUES('',?,?,?,?,?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0],$data[1],$data[2],$data[3],"Sin asignacion"));
        $msn= "El equipo fue guardado exitosamente.";

      } catch (PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                               EQUIPOS                                                      //
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
