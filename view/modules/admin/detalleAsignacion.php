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
      <li class="active"><a href="?c=admin&a=ReadAsignacion">Asignacion</a></li>
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

  <form action="?c=admin&a=UpdateAsignacion" method="post">
    <h3>Modficar asignación</h3>

    <?php foreach($result as $data){ ?>

    <div class="input-field col s8 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_id; ?>" required>
      <label>ID</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_piso; ?>" required>
      <label>Piso</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->asig_oficina; ?>">
      <label>Oficina</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_puesto; ?>" required>
      <label>Puesto</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->asig_lob; ?>" required>
      <label>LOB</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_split; ?>" required>
      <label>Split</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->asig_tipo_servicio; ?>" required>
      <label>Tipo de servicio</label>
    </div>

    <div class="input-field col s8 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_obser; ?>">
      <label>Comentarios</label>
    </div>

    <button id="btn" type="submit" class="btn waves-effect waves-light col s4 offset-s2 green darken-1 ">Actualizar</button>

  <?php } ?>

  </form>

  <a href="?c=admin&a=ReadAsignacion" class="btn waves-effect waves-light col s4 blue-grey darken-2">Cancelar</a>

</div>
