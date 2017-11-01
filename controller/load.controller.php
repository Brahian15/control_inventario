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
  }
?>
