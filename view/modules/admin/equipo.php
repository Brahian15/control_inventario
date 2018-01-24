<div class="row z-depth-4" id="cuerpo">
  <form action="?c=admin&a=CreateEquipo" method="post">

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
        <li><a href="?c=admin&a=ListaOffice">Version de Office</a></li>
        <li class="divider"></li>
        <li><a href="?c=admin&a=ListaCargo">Cargo</a></li>
      </ul>
      <div class="nav-wrapper green darken-1">
        <ul>
          <li><a class="dropdown-button" data-activates="dropdown1" href="">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
          <li class="active"><a href="?c=admin&a=Equipo">CPU</a></li>
          <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
          <li><a href="?c=admin&a=Teclado">Teclado</a></li>
          <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
          <li><a href="?c=admin&a=Asignacion">Asignacion</a></li>
          <li><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?c=admin&a=logout" onclick="return confirm('¿Desea cerrar la sesion?')">Cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

    <h3>Registro de CPU</h3>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required autofocus>
      <label>Serial</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>type</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Consecutivo del inventario</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Hostname</label>
    </div>

    <p class="col s8 offset-s2 center">Amadeus ARD</p>

    <div class="input-field col s3 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>ATID</label>
    </div>

    <div class="input-field col s2">
      <input type="text" name="data[]" class="validate" required>
      <label>OID</label>
    </div>

    <div class="input-field col s3">
      <input type="text" name="data[]" class="validate" required>
      <label>CID</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <select name="data[]">
        <option value="" disabled selected>Office</option>
        <option value="Si">Si</option>
        <option value="No">No</option>
      </select>
    </div>

    <div class="input-field col s4">
      <select name="data[]">
        <option value="" disabled selected>Versión de office</option>
        <?php $this->load->LoadVersionOffice(); ?>
      </select>
    </div>

    <div class="input-field col s8 offset-s2">
      <select name="data[]">
        <option value="" disabled selected>Cargo</option>
        <?php $this->load->LoadCargo(); ?>
      </select>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Nice ScreenAgent</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Nice supervisor</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]">
      <label>Spector360</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Amadeus CM</label>
    </div>

    <button id="btnGuardarEqui" type="submit" class="btn waves-effect waves-light col s4 offset-s2 green darken-1">Guardar</button>

  </form>

  <a id="btnCancelarEqui" href="?c=admin&a=dashboard" class="btn waves-effect waves-light col s4 blue-grey darken-2">Cancelar</a>
</div>
