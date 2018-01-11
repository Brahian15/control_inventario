<div class="row">
  <div id="registro" class="z-depth-4 white center col m4 offset-m4">
    <form action="index.php?c=admin&a=CreateUser" method="post">

      <div class="card-panel green darken-1">
        <h3 id="titleReg" class="center-align">REGISTRO</h3>
      </div>

      <div class="input-field col s12">
        <input type="email" name="data[]" autofocus required>
        <label>Correo electronico</label>
      </div>

      <div class="input-field col s12">
        <input type="text" name="data[]" required>
        <label>Nombre completo</label>
      </div>

      <div class="input-field col s12">
        <select name="data[]" required>
          <option value="" disabled selected>Seleccione el rol</option>
          <?php $this->load->LoadRol(); ?>
        </select>
      </div>

      <div class="input-field col s12">
        <input type="password" name="data[]" required>
        <label>Contraseña</label>
      </div>

      <button id="btnLogin" type="submit" class="btn waves-effect waves-light green darken-1 col s6">Registrarse</button>

    </form>

    <a id="btnRegistro" href="index.php" class="btn waves-effect waves-light blue-grey darken-2 col s5 offset-s1">Atras</a>

  </div>
</div>
