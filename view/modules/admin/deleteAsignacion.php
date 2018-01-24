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
        <li><a href="?c=admin&a=logout" onclick="return confirm('¿Deseas cerrar sesion?')">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

  <form action="?c=admin&a=DeleteAsignacion" method="post">

    <h3>Eliminar asignación</h3>

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

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->equi_consecutivo; ?>">
      <label>Consecutivo del equipo</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->pant_consecutivo; ?>">
      <label>Consecutivo de la pantalla</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_seg_pant; ?>">
      <label>Consecutivo de la segunda pantalla</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->tec_consecutivo; ?>">
      <label>Consecutivo del teclado</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->hard_consecutivo; ?>">
      <label>Consecutivo del hardphone</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->asig_fecha; ?>" class="tooltipped" data-position="bottom" data-tooltip="Fecha de asignación">
    </div>

    <div class="input-field col s8 offset-s2">
      <textarea id="textarea1" name="data[]" class="materialize-textarea validate"></textarea>
      <label for="textarea1">Comentarios</label>
    </div>

    <button id="btnGuardar" type="submit" class="btn waves-effect waves-light col s4 offset-s2 red darken-1" onclick="return confirm('¿Desea eliminar la asignacion permanentemente?')">Eliminar</button>

  <?php } ?>

  </form>

  <a href="?c=admin&a=ReadAsignacion" class="btn waves-effect waves-light col s4 blue-grey darken-2">Cancelar</a>
</div>
