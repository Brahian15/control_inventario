<?php
  require_once 'model/user.model.php';

  class loadController{

    private $load;

    public function __CONSTRUCT(){
      $this->load = new UserModel();
    }

    //Funcion para cargar los roles de lo usuarios

    public function LoadRol(){
      $data= $this->load->ReadRol();
      foreach($data as $row){
        echo "<option value='".$row["rol_id"]."'>".$row["rol_nom"]."</option>";
      }
    }

    //Funcion para cargar los datos de las CPU registrados en el sistema

    public function LoadEquipo(){
      $data= $this->load->ReadEquipobyAsignacion();
      foreach($data as $row){
        echo "<option value='".$row["equi_id"]."'>".$row["equi_consecutivo"]."</option>";
      }
    }

    //Funcion para cargar los datos de las pantallas registradas en el sistema

    public function LoadPantalla(){
      $data= $this->load->ReadPantallabyAsignacion();
      foreach($data as $row){
        echo "<option value='".$row["pant_id"]."'>".$row["pant_consecutivo"]."</option>";
      }
    }

    //Funcion para cargar los datos de las pantallas registradas en el sistema

    public function LoadSegPantalla(){
      $data= $this->load->ReadPantallabyAsignacion();
      foreach($data as $row){
        echo "<option value='".$row["pant_consecutivo"]."'>".$row["pant_consecutivo"]."</option>";
      }
    }

    //Funcion para cargar los datos de los taclados registrados en el sistema

    public function LoadTeclado(){
      $data= $this->load->ReadTecladobyAsignacion();
      foreach($data as $row){
        echo "<option value='".$row["tec_id"]."'>".$row["tec_consecutivo"]."</option>";
      }
    }

    //Funcion para cargar los datos de los teclados registrados en el sistema

    public function LoadHardphone(){
      $data= $this->load->ReadHardphonebyAsignacion();
      foreach($data as $row){
        echo "<option value='".$row["hard_id"]."'>".$row["hard_consecutivo"]."</option>";
      }
    }

    //Funcion para cargar los datos de las versiones registradas en el sistema

    public function LoadVersionOffice(){
      $data= $this->load->ReadVersionOfficebyEqui();
      foreach($data as $row){
        echo "<option value='".$row["ver_id"]."'>".$row["ver_nom"]."</option>";
      }
    }

    //Funcion para cargar los datos de los cargos registrados en el sistema

    public function LoadCargo(){
      $data= $this->load->ReadCargobyEqui();
      foreach($data as $row){
        echo "<option value='".$row["carg_id"]."'>".$row["carg_nom"]."</option>";
      }
    }
  }
?>
