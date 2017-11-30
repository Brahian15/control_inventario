<div class="row z-depth-4" id="cuerpo">

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
      <li><a href="?c=admin&a=ReadAsignacion">Asignacion</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li class="active"><a href="?c=admin&a=ListaOffice">Version de Office</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ListaCargo">Cargo</a></li>
    </ul>
    <div class="nav-wrapper green darken-1">
      <ul>
        <li><a class="dropdown-button" data-activates="dropdown1">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="?c=admin&a=Equipo">CPU</a></li>
        <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
        <li><a href="?c=admin&a=Teclado">Teclado</a></li>
        <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
        <li><a href="?c=admin&a=Asignacion">Asignacion</a></li>
        <li class="active"><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="?c=admin&a=logout" onclick="return confirm('¿Desea cerrer sesion?')">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

  <h3>Lista de versión de office</h3>

  <form action="?c=admin&a=CreateVersionOffice" method="post">
    <div class="input-field col s8 offset-s2">
      <input type="text" name="data[]" required autofocus>
      <label>Nueva versión de office</label>
    </div>

    <button id="btnGuardar" type="submit" class="btn waves-effect waves-light col s4 offset-s2 green darken-1">Guardar</button>
  </form>

  <a href="?c=admin&a=dashboard" class="btn waves-effect waves-light col s4 blue-grey darken-2">Cancelar</a>

  <?php foreach($result as $data){ ?>

    <?php if($data->ver_id <> "1"){ ?>

      <div class="input-field col s8 offset-s2">
        <input type="text" name="data[]" value="<?php echo $data->ver_nom; ?>">
        <label>Versión de office</label>
      </div>

      <a id="btn" href="?id=<?php echo $data->ver_id; ?>&c=admin&a=DeleteVersionOffice" class="btn waves-effect waves-light col s8 offset-s2 blue-grey darken-2 tooltipped" data-position="right" data-tooltip="Eliminar versión" onclick="return confirm('¿Desea eliminar esta version permanentemente?')"><i class="small material-icons">delete</i></a>

    <?php } ?>

  <?php } ?>

</div>
