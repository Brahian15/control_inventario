<div class="row z-depth-4" id="cuerpo">
  <form class="" action="" method="post">

    <nav>
      <div class="nav-wrapper green darken-1">
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="?c=admin&a=dashboard">CPU</a></li>
          <li class="divider"></li>
          <li><a href="?c=admin&a=ReadPantalla">Pantalla</a></li>
          <li class="divider"></li>
          <li><a href="?c=admin&a=ReadTeclado">Teclado</a></li>
          <li class="divider"></li>
          <li><a href="?c=admin&a=ReadHardphone">Hardphone</a></li>
          <li class="divider"></li>
          <li class="active"><a href="?c=admin&a=ReadAsignacion">Asignacion</a></li>
        </ul>
      <?php if($_SESSION["user"]["rol"]!= "2"){ ?>
        <ul id="dropdown2" class="dropdown-content">
          <li><a href="?c=admin&a=ListaOffice">Version de Office</a></li>
          <li class="divider"></li>
          <li><a href="?c=admin&a=ListaCargo">Cargo</a></li>
        </ul>
      <?php } ?>
        <ul>
          <li class="active"><a class="dropdown-button" data-activates="dropdown1" href="">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
        <?php if($_SESSION["user"]["rol"]!= "2"){ ?>
          <li><a href="?c=admin&a=Equipo">CPU</a></li>
          <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
          <li><a href="?c=admin&a=Teclado">Teclado</a></li>
          <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
          <li><a href="?c=admin&a=Asignacion">Asignacion</a></li>
          <li><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
        <?php } ?>
          <li><a href="?c=admin&a=logout" onclick="return confirm('¿Desea cerrar la sesion?')">Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

    <form action="?c=admin&a=ReadAsignacion" method="post">
      <h3>Buscar asignación</h3>

      <div class="col s5 offset-s3">
        <input type="text" name="user" autofocus>
      </div>

      <button type="submit" class="btn waves-effect waves-light col s1 blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Buscar"><i class="small material-icons">search</i></button>

    </form>

    <?php if($_SESSION["user"]["rol"]!= "2"){ ?>
      <a id="btnReporte" href="?c=admin&a=ReporteExcel" class="btn waves-effect waves-light col s8 offset-s2 green darken-1">DESCARGAR REPORTE EN EXCEL</a>
    <?php } ?>

    <?php
    if(isset($_POST['user'])){
      $user= $_POST['user'];
      $user= $this->model->SearchAsignacion($user);
      if(count($user)>0){
        foreach($user as $row){ ?>

    <table class="highlight bordered col s10 offset-s1">
      <thead class="green darken-1">
        <tr>
          <th>Piso</th>
          <th>Oficina</th>
          <th>Puesto</th>
          <th>Consecutivo de la CPU</th>
          <th>Consecutivo de la pantalla</th>
          <th>Consecutivo del teclado</th>
          <th>Consecutivo del hardphone</th>
          <th>Asignado por</th>
          <th>Fecha de asignación</th>
          <?php if($_SESSION["user"]["rol"] != "2"){ ?>
            <th>Acción</th>
            <th></th>
          <?php } ?>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo $row['asig_piso']; ?></td>
          <td><?php echo $row['asig_oficina']; ?></td>
          <td><?php echo $row['asig_puesto']; ?></td>
          <td><?php echo $row['equi_consecutivo']; ?></td>
          <td><?php echo $row['pant_consecutivo']; ?></td>
          <td><?php echo $row['tec_consecutivo']; ?></td>
          <td><?php echo $row['hard_consecutivo']; ?></td>
          <td><?php echo $row['user_name'] ?></td>
          <td><?php echo $row['asig_fecha']; ?></td>
          <?php if($_SESSION["user"]["rol"] != "2"){ ?>
            <td><a href="?detalle=<?php echo $row['asig_id']; ?>&c=admin&a=DetalleAsignacion" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="left" data-tooltip="Modificar asignación"><i class="small material-icons">update</i></a></td>
            <td><a href="?id=<?php echo $row['asig_id']; ?>&c=admin&a=ReadDeleteAsignacion" class="btn waves-effect waves-light red darken-1 tooltipped" data-position="top" data-tooltip="Eliminar asignacion"><i class="small material-icons">delete</i></a></td>
          <?php } ?>
        </tr>
      </tbody>
    </table>

  <?php }
  }else{
    echo "<br><br><br><br><h5 class='info'>No se han encontrado resultados</h5>";
  }
}else{ ?>

    <table class="highlight bordered col s10 offset-s1">
      <thead class="green darken-1">
        <tr>
          <th>Piso</th>
          <th>Oficina</th>
          <th>Puesto</th>
          <th>Consecutivo de la CPU</th>
          <th>Consecutivo de la pantalla</th>
          <th>Segunda pantalla</th>
          <th>Consecutivo del teclado</th>
          <th>Consecutivo del hardphone</th>
          <th>Asignado por</th>
          <th>Fecha de asignación</th>
          <?php if($_SESSION["user"]["rol"] != "2"){ ?>
            <th>Acción</th>
            <th></th>
          <?php } ?>
        </tr>
      </thead>

      <?php foreach($result as $data){ ?>

      <tbody>
        <tr>
          <td><?php echo $data->asig_piso; ?></td>
          <td><?php echo $data->asig_oficina; ?></td>
          <td><?php echo $data->asig_puesto; ?></td>
          <td><?php echo $data->equi_consecutivo; ?></td>
          <td><?php echo $data->pant_consecutivo; ?></td>
          <td><?php echo $data->asig_seg_pant; ?></td>
          <td><?php echo $data->tec_consecutivo; ?></td>
          <td><?php echo $data->hard_consecutivo; ?></td>
          <td><?php echo $data->user_name; ?></td>
          <td><?php echo $data->asig_fecha; ?></td>
          <?php if($_SESSION["user"]["rol"] != "2"){ ?>
            <td><a href="?detalle=<?php echo $data->asig_id; ?>&c=admin&a=DetalleAsignacion" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="left" data-tooltip="Modificar asignación"><i class="small material-icons">update</i></a></td>
            <td><a href="?id=<?php echo $data->asig_id; ?>&c=admin&a=ReadDeleteAsignacion" class="btn waves-effect waves-light red darken-1 tooltipped" data-position="top" data-tooltip="Eliminar asignación"><i class="small material-icons">delete</i></a></td>
          <?php } ?>
        </tr>
      </tbody>

    <?php } ?>

    </table>

  <?php } ?>

  </form>
</div>
