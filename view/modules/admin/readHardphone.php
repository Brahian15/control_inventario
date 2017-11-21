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
        <li class="active"><a href="?c=admin&a=ReadHardphone">Hardphone</a></li>
        <li class="divider"></li>
        <li><a href="?c=admin&a=ReadAsignacion">Asignacion</a></li>
      </ul>
      <ul id="dropdown2" class="dropdown-content">
        <li><a href="?c=admin&a=ListaOffice">Version de Office</a></li>
        <li class="divider"></li>
        <li><a href="?c=admin&a=ListaCargo">Cargo</a></li>
      </ul>
      <div class="nav-wrapper green darken-1">
        <ul>
          <li class="active"><a class="dropdown-button" data-activates="dropdown1" href="">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?c=admin&a=Equipo">CPU</a></li>
          <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
          <li><a href="?c=admin&a=Teclado">Teclado</a></li>
          <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
          <li><a href="?c=admin&a=Asignacion">Asignacion</a></li>
          <li><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?c=admin&a=logout" onclick="return confirm('¿Desea cerrar sesion?')">Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

    <form action="?c=admin&a=ReadHardphone" method="GET">
      <h3>Buscar hardphone</h3>

      <div class="col s5 offset-s3">
        <input type="text" name="user" autofocus>
      </div>

      <button type="submit" class="btn waves-effect waves-light col s1 blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Buscar"><i class="small material-icons">search</i></button>

    </form>

    <?php
    if(isset($_POST['user'])){
      $user= $_POST['user'];
      $user= $this->model->SearchHardphone($user);
      if (count($user)>0){
        foreach($user as $row){ ?>

    <table class="highlight bordered col s10 offset-s1">
      <thead class="green darken-1">
        <tr>
          <th>Serial</th>
          <th>Type</th>
          <th>Consecutivo del inventario</th>
          <th>Extensión</th>
          <th>Estado</th>
          <th>Acción</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo $row['hard_serial']; ?></td>
          <td><?php echo $row['hard_type']; ?></td>
          <td><?php echo $row['hard_consecutivo']; ?></td>
          <td><?php echo $row['hard_extension']; ?></td>
          <td><?php echo $row['hard_estado'] ?></td>
          <td><a href="?detalle=<?php echo $row['hard_serial']; ?>&c=admin&a=DetalleHardphone" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="top" data-tooltip="Detalle del hardphone"><i class="small material-icons">update</i></a></td>
          <td><a href="?id=<?php echo $row['hard_id']; ?>&c=admin&a=DeleteHardphone" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Eliminar hardphone" onclick="return confirm('¿Desea eliminar el hardphone permanentemente?')"><i class="small material-icons">delete</i></a></td>
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
          <th>Serial</th>
          <th>Type</th>
          <th>Consecutivo del inventario</th>
          <th>Extensión</th>
          <th>Estado</th>
          <th>Acción</th>
          <th></th>
        </tr>
      </thead>

      <?php foreach($result as $data){ ?>

      <tbody>
        <tr>
          <td><?php echo $data->hard_serial; ?></td>
          <td><?php echo $data->hard_type; ?></td>
          <td><?php echo $data->hard_consecutivo; ?></td>
          <td><?php echo $data->hard_extension; ?></td>
          <td><?php echo $data->hard_estado; ?></td>
          <td><a href="?detalle=<?php echo $data->hard_serial; ?>&c=admin&a=DetalleHardphone" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="top" data-tooltip="Detalle del hardphone"><i class="small material-icons">update</i></a></td>
          <td><a href="?id=<?php echo $data->hard_id; ?>&c=admin&a=DeleteHardphone" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Eliminar hardphone" onclick="return confirm('¿Desea eliminar el hardphone permanentemente?')"><i class="small material-icons">delete</i></a></td>
        </tr>
      </tbody>

    <?php } ?>

    </table>

  <?php } ?>

  </form>
</div>
