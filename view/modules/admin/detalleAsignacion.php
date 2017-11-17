<div class="row z-depth-4" id="cuerpo">

  <nav>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="?c=admin&a=dashboard">CPU</a></li>
      <li class="divider"></li>
      <li class="active"><a href="?c=admin&a=ReadPantalla">Pantalla</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadTeclado">Teclado</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadHardphone">Hardphone</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadAsignacion">Asignacion</a></li>
    </ul>
    <div class="nav-wrapper green darken-1">
      <ul>
        <li class="active"><a class="dropdown-button" data-activates="dropdown1" href="">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="?c=admin&a=Equipo">CPU</a></li>
        <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
        <li><a href="?c=admin&a=Teclado">Teclado</a></li>
        <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
        <li><a href="?c=admin&a=Asignacion">Asignacion</a></li>
        <li><a href="?c=admin&a=logout" onclick="return confirm('¿Desea cerrar sesion?')">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

  <form action="" method="post">
    <h3>Detalle de la asignación</h3>

    <?php foreach($result as $data){ ?>

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
      <input type="text" name="data[]" value="<?php echo $data->asig_extension; ?>" required>
      <label>Extension</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_lob; ?>" required>
      <label>LOB</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->asig_split; ?>" required>
      <label>Split</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_tipo_servicio; ?>" required>
      <label>Tipo de servicio</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->asig_atid; ?>" required>
      <label>Amadeur ARD: ATID</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_iod; ?>" required>
      <label>Amadeus ARD: OID</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->asig_cid; ?>" required>
      <label>Amadeus ARD: CID</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->asig_office; ?>" required>
      <label>Office</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="">
    </div>
  </form>

</div>
