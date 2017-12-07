<div class="row z-depth-4" id="cuerpo">
<form action="" method="post">

  <nav>
    <ul id="dropdown1" class="dropdown-content">
      <li class="active"><a href="?c=admin&a=dashboard">CPU</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadPantalla">Pantalla</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadTeclado">Teclado</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadHardphone">Hardphone</a></li>
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
        <li class="active"><a class="dropdown-button" data-activates="dropdown1">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="?c=admin&a=Equipo">CPU</a></li>
        <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
        <li><a href="?c=admin&a=Teclado">Teclado</a></li>
        <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
        <li><a href="?c=admin&a=Asignacion">Asignacion</a></li>
        <li><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="?c=admin&a=logout" onclick="return confirm('¿Desea cerrer sesion?')">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

  <form action="?c=admin&a=dashboard" method="GET">
    <h3>Buscar CPU</h3>

    <div class="input-field col s5 offset-s3">
      <input type="text" name="user" autofocus>
    </div>

    <button type="submit" class="btn waves-effect waves-light col s1 blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Buscar"><i class="small material-icons">search</i></button>
  </form>

  <?php
  if(isset($_POST['user'])){
    $user= $_POST['user'];
    $user= $this->model->SearchEquipo($user);
      if(count($user)>0){
        foreach($user as $row){ ?>

          <table class="highlight bordered col s10 offset-s1">
            <thead class="green darken-1">
              <tr>
                <th>Serial</th>
                <th>Type</th>
                <th>Consecutivo del inventario</th>
                <th>Hostname</th>
                <th>Estado</th>
                <th>Acción</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td><?php echo $row['equi_serial']; ?></td>
                <td><?php echo $row['equi_type']; ?></td>
                <td><?php echo $row['equi_consecutivo']; ?></td>
                <td><?php echo $row['equi_hostname']; ?></td>
                <td><?php echo $row['equi_estado']; ?></td>
                <td><a href="?detalle=<?php echo $row['equi_serial']; ?>&c=admin&a=DetalleEquipo" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="top" data-tooltip="Modificar CPU"><i class="small material-icons">update</i></a></td>
                <td><a href="?id=<?php echo $row['equi_id']; ?>&c=admin&a=DeleteEquipo" class="btn waves-effect waves-light red darken-1 tooltipped" data-position="right" data-tooltip="Eliminar CPU" onclick="return confirm('¿Desea eliminar la CPU permanentemente?')"><i class="small material-icons">delete</i></a></td>
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
          <th>Hostname</th>
          <th>Estado</th>
          <th>Acción</th>
          <th></th>
        </tr>
      </thead>

      <?php foreach ($result as $data){ ?>

      <tbody>
        <tr>
          <td><?php echo $data->equi_serial; ?></td>
          <td><?php echo $data->equi_type; ?></td>
          <td><?php echo $data->equi_consecutivo; ?></td>
          <td><?php echo $data->equi_hostname; ?></td>
          <td><?php echo $data->equi_estado; ?></td>
          <td><a href="?detalle=<?php echo $data->equi_serial; ?>&c=admin&a=DetalleEquipo" class="btn waves-effect waves-light blue-grey darken-2 tooltipped" data-position="top" data-tooltip="Modificar CPU"><i class="small material-icons">update</i></a></td>
          <td><a href="?id=<?php echo $data->equi_id; ?>&c=admin&a=DeleteEquipo" class="btn waves-effect waves-light red darken-1 tooltipped" data-position="right" data-tooltip="Eliminar CPU" onclick="return confirm('¿Desea eliminar la CPU permanentemente?')"><i class="small material-icons">delete</i></a></td>
        </tr>
      </tbody>

    <?php } ?>

    </table>

  <?php } ?>

  </form>
</div>
