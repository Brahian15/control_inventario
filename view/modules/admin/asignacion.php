<div class="row z-depth-4" id="cuerpo">
  <form action="?c=admin&a=CreateAsignacion" method="post">

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
      <div class="nav-wrapper green darken-1">
        <ul>
          <li><a class="dropdown-button" data-activates="dropdown1" href="">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="?c=admin&a=Equipo">CPU</a></li>
          <li><a href="?c=admin&a=Pantalla">Pantalla</a></li>
          <li><a href="?c=admin&a=Teclado">Teclado</a></li>
          <li><a href="?c=admin&a=Hardphone">Hardphone</a></li>
          <li class="active"><a href="?c=admin&a=Asignacion">Asignacion</a></li>
          <li><a href="?c=admin&a=logout">Cerrar sesion</a></li>
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
      <label>Extensión</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>LOB</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Split</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" =class"validate" required>
      <label>Tipo de servicio</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Amadeus ARD: ATID</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Amadeus ARD: OID</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Amadeus ARD: CID</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Office</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Version de office</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>CMS Supervisor</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Supervisor</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Nice ScreenAgent</label>
    </div>
    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Nice</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Spector360</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Amadeus CM</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Serial de la CPU</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Serial de la pantalla</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Serial del teclado</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Serial del Hardphone</label>
    </div>

    <div class="input-field col s8 offset-s2">
      <input type="date" name="data[]" value="<?php echo $fecha; ?>" class="validate tooltipped" required data-position="bottom" data-tooltip="Fecha de asignación">
    </div>

    <div class="input-field col s8 offset-s2">
      <textarea id="textarea1" name="data[]" class="materialize-textarea validate"></textarea>
      <label for="textarea1">Comentarios</label>
    </div>

    <button id="btnGuardar" type="submit" class="btn waves-effect waves-light col s4 offset-s2 green darken-1">Guardar</button>

  </form>

  <a href="?c=admin&a=dashboard" class="btn waves-effect waves-light col s4 blue-grey darken-2">Cancelar</a>
</div>
