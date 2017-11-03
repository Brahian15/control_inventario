<div class="row z-depth-4" id="cuerpo">
  <form class="" action="index.html" method="post">

    <nav>
      <div class="nav-wrapper green darken-1">
        <ul>
          <li class="active"><a href="#">Equipo</a></li>
          <li><a href="#">Pantalla</a></li>
          <li><a href="#">Teclado</a></li>
          <li><a href="#">Hardphone</a></li>
          <li><a href="#">Asignacion</a></li>
        </ul>
      </div>
    </nav>

    <h3>Registro de equipos</h3>

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

    <button id="btnCancelar" type="button" class="btn waves-effect waves-light col s4 offset-s2 green darken-1">Guardar</button>

  </form>

  <a href="?c=admin&a=dashboard" class="btn waves-effect waves-light col s4 blue-grey darken-2">Cancelar</a>
</div>
