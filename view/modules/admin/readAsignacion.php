<div class="row z-depth-4" id="cuerpo">
  <form class="" action="" method="post">

    <nav>
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
      <div class="nav-wrapper green darken-1">
        <ul>
          <li class="active"><a class="dropdown-button" data-activates="dropdown1" href="">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?c=admin&a=Equipo">CPU</a></li>
          <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
          <li><a href="?c=admin&a=Teclado">Teclado</a></li>
          <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
          <li><a href="?c=admin&a=Asignacion">Asignacion</a></li>
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
          <th>Acción</th>
          <th></th>
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
          <td><a href="?detalle=<?php echo $row['asig_id']; ?>&c=admin&a=DetalleAsignacion" class="btn waves-effect waves-light blue-darken-2 tooltipped" data-position="right" data-tooltip="Detalle de la asignación"><i class="small material-icons">update</i></a></td>
          <td><a href="?id=<?php echo $row['asig_id']; ?>&c=admin&a=DeleteAsignacion" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="rght" data-tooltip="Eliminar asignacion" onclick="return confirm('¿Desea eliminar la asignacion permanentemente?')"><i class="small material-icons">delete</i></a></td>
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
          <th>Consecutivo del teclado</th>
          <th>Consecutivo del hardphone</th>
          <th>Asignado por</th>
          <th>Fecha de asignación</th>
          <th>Acción</th>
          <th></th>
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
          <td><?php echo $data->tec_consecutivo; ?></td>
          <td><?php echo $data->hard_consecutivo; ?></td>
          <td><?php echo $data->user_name; ?></td>
          <td><?php echo $data->asig_fecha; ?></td>
          <td><a href="?detalle=<?php echo $data->asig_id; ?>&c=admin&a=DetalleAsignacion" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Detalle de la asignación"><i class="small material-icons">update</i></a></td>
          <td><a href="?id=<?php echo $data->asig_id; ?>&c=admin&a=DeleteAsignacion" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Eliminar asignación" onclick="return confirm('¿Desea eliminar la asignación permanentemente?')"><i class="small material-icons">delete</i></a></td>
        </tr>
      </tbody>

    <?php } ?>

    </table>

  <?php } ?>

  </form>
</div>
