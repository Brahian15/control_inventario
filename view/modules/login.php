<div class="row">
  <div id="login" class="z-depth-4 white center col m4 offset-m4">
    <form id="fmrLogin" method="post" data-parsley-validate>

      <div class="card-panel green darken-1">
        <h3 id="titleLogin" class="center-align">INICIO DE SESION</h3>
      </div>

      <div class="input-field col s12">
        <input id="email" type="email" name="data[]" class="validate" required="required" autofocus>
        <label for="email">Correo electronico</label>
      </div>

      <div class="input-field col s12">
        <input id="pass" type="password" name="data[]" class="validate" required="required">
        <label for="pass">Contraseña</label>
      </div>

      <button id="btnLogin" type="submit" class="btn waves-effect waves-light green darken-1 col s6">Iniciar sesion</button>

    </form>

    <a id="btnRegistro" href="?c=admin&a=register" class="btn waves-effect waves-light blue-grey darken-2 col s5 offset-s1">Registrarse</a>

  </div>
</div>
