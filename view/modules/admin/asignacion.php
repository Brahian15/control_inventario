<div class="row z-depth-4" id="cuerpo">
  <form action="?c=admin&a=CreateAsignacion" method="post">

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
          <li><a href="?c=admin&a=ReadAsignacion">Asignacion</a></li>
        </ul>
        <ul id="dropdown2" class="dropdown-content">
          <li><a href="?c=admin&a=ListaOffice">Version de Office</a></li>
          <li class="divider"></li>
          <li><a href="?c=admin&a=ListaCargo">Cargo</a></li>
        </ul>
        <ul>
          <li><a class="dropdown-button" data-activates="dropdown1" href="">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?c=admin&a=Equipo">CPU</a></li>
          <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
          <li><a href="?c=admin&a=Teclado">Teclado</a></li>
          <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
          <li class="active"><a href="?c=admin&a=Asignacion">Asignacion</a></li>
          <li><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?c=admin&a=logout" onclick="return confirm('¿Deseas cerrar sesion?')">Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

    <?php $fecha= date("Y-m-d"); ?>

    <h3>Registro de asignación</h3>

    <div class="input-field col s4 offset-s2">
      <input type="number" name="data[]" class="validate" required autofocus>
      <label>Piso</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate">
      <label>Oficina</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="number" name="data[]" class="validate" required>
      <label>Puesto</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>LOB</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Split</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Tipo de servicio</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <select name="data[]">
        <option value="" disabled selected>Elige el consecutivo de inventario de la CPU</option>
        <?php $this->load->LoadEquipo(); ?>
      </select>
    </div>

    <div class="input-field col s4">
      <select name="data[]">
        <option value="" disabled selected>Elige el consecutivo de inventario de la pantalla</option>
        <?php $this->load->LoadPantalla(); ?>
      </select>
    </div>

    <div class="input-field col s4 offset-s2">
      <select name="data[]">
        <option value="" disabled selected>Elige el consecutivo de inventario de la segunda pantalla</option>
        <option value="Sin segunda pantalla">Sin segunda pantalla</option>
        <?php $this->load->LoadSegPantalla(); ?>
      </select>
    </div>

    <div class="input-field col s4">
      <select name="data[]">
        <option value="" disabled selected>Elige el consecutivo de inventario del teclado</option>
        <?php $this->load->LoadTeclado(); ?>
      </select>
    </div>

    <div class="input-field col s4 offset-s2">
      <select name="data[]">
        <option value="" disabled selected>Elige el consecutivo de inventario del hardphone</option>
        <?php $this->load->LoadHardphone(); ?>
      </select>
    </div>

    <div class="input-field col s4">
      <input type="date" name="data[]" value="<?php echo $fecha; ?>" class="validate tooltipped" required data-position="bottom" data-tooltip="Fecha de asignación">
    </div>

    <div class="input-field col s8 offset-s2">
      <textarea id="textarea1" name="data[]" class="materialize-textarea validate"></textarea>
      <label for="textarea1">Observaciones</label>
    </div>

    <button id="btnGuardar" type="submit" class="btn waves-effect waves-light col s4 offset-s2 green darken-1">Guardar</button>

  </form>

  <a href="?c=admin&a=dashboard" class="btn waves-effect waves-light col s4 blue-grey darken-2">Cancelar</a>
</div>
