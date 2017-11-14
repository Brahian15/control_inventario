<div class="row z-depth-4" id="cuerpo">
  <form action="" method="post">

    <nav>
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="?c=admin&a=dashboard">Equipo</a></li>
        <li class="divider"></li>
        <li><a href="?c=admin&a=ReadPantalla">Pantalla</a></li>
        <li class="divider"></li>
        <li class="active"><a href="?c=admin&a=ReadTeclado">Teclado</a></li>
        <li class="divider"></li>
        <li><a href="?c=admin&a=ReadHardphone">Hardphone</a></li>
        <li class="divider"></li>
        <li><a href="?c=admin&a=ReadAsignacion">Asignacion</a></li>
      </ul>
      <div class="nav-wrapper green darken-1">
        <ul>
          <li class="active"><a class="dropdown-button" data-activates="dropdown1" href="">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?c=admin&a=Equipo">Equipo</a></li>
          <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
          <li><a href="?c=admin&a=Teclado">Teclado</a></li>
          <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
          <li><a href="?c=admin&a=Asignacion">Asignacion</a></li>
          <li><a href="?c=admin&a=logout">Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

    <form action="?c=admin&a=ReadTeclado" method="GET">
      <h3>Buscar teclados</h3>

      <div class="input-field col s5 offset-s3">
        <input type="text" name="user" autofocus>
      </div>

      <button type="submit" class="btn waves-effect waves-light col s1 blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Buscar"><i class="small material-icons">search</i></button>
    </form>

    <?php
    if(isset($_POST['user'])){
      $user= $_POST['user'];
      $user= $this->model->SearchTeclado($user);
      if(count($user)>0){
        foreach($user as $row){ ?>

    <table class="highlight bordered col s10 offset-s1">
      <thead class="green darken-1">
        <tr>
          <th>Serial</th>
          <th>Type</th>
          <th>Consecutivo del inventario</th>
          <th>Estado</th>
          <th>Acción</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo $row['tec_serial']; ?></td>
          <td><?php echo $row['tec_type']; ?></td>
          <td><?php echo $row['tec_consecutivo']; ?></td>
          <td><?php echo $row['tec_estado']; ?></td>
          <td><a href="" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Eliminar teclado" onclick="return confirm('¿Desea eliminar el teclado permanentemente?')"><i class="small material-icons">delete</i></a></td>
        </tr>
      </tbody>
    </table>

  <?php }
    }else{
      echo "<br><br><br><br><h5 class='info'>No se han encontrado resultados</h5>";
    }
  }else{
     ?>

    <table class="highlight bordered col s10 offset-s1">
      <thead class="green darken-1">
        <tr>
          <th>Serial</th>
          <th>Type</th>
          <th>Consecutivo del inventario</th>
          <th>Estado</th>
          <th>Acción</th>
        </tr>
      </thead>

      <?php foreach($result as $data){ ?>

      <tbody>
        <tr>
          <td><?php echo $data->tec_serial; ?></td>
          <td><?php echo $data->tec_type; ?></td>
          <td><?php echo $data->tec_consecutivo; ?></td>
          <td><?php echo $data->tec_estado; ?></td>
          <td><a href="#" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Eliminar teclado" onclick="return confirm('¿Desea eliminar el teclado permanentemente?')"><i class="small material-icons">delete</i></a></td>
        </tr>
      </tbody>

    <?php } ?>

    </table>

  <?php } ?>

  </form>
</div>
