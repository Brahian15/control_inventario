<div class="row z-depth-4" id="cuerpo">

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

  <form action="?c=admin&a=UpdateEquipo" method="post">
    <h3>Modificar CPU</h3>

    <?php foreach($result as $data){ ?>

    <div class="input-field col s8 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_id; ?>">
      <label>ID</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_serial; ?>" required>
      <label>Serial</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->equi_type; ?>" required>
      <label>Type</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_consecutivo; ?>" required>
      <label>Consecutivo del inventario</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->equi_hostname; ?>" required>
      <label>Hostname</label>
    </div>

    <p class="col s8 offset-s2 center">Amadeus ARD</p>

    <div class="input-field col s3 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_atid; ?>" required>
      <label>ATID</label>
    </div>

    <div class="input-field col s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_oid; ?>" required>
      <label>OID</label>
    </div>

    <div class="input-field col s3">
      <input type="text" name="data[]" value="<?php echo $data->equi_cid; ?>" required>
      <label>CID</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_office; ?>" required disabled>
      <label>Office</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->ver_nom; ?>" disabled>
      <label>Versión de office</label>
    </div>

    <div class="input-field col s8 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->carg_nom; ?>" disabled>
      <label>Cargo</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_nice_screen; ?>" required>
      <label>Nice ScreenAgent</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->equi_nice_super; ?>" required>
      <label>Nice</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_spector; ?>">
      <label>Spector360</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->equi_amadeus_cm; ?>" required>
      <label>Amadeus CM</label>
    </div>

    <button id="btn" type="submit" class="btn waves-effect waves-light col s4 offset-s2 green darken-1">Actualizar</button>

  <?php } ?>

  </form>

  <a href="?c=admin&a=dashboard" class="btn waves-effect waves-light col s4 blue-grey darken-2">Cancelar</a>

</div>
