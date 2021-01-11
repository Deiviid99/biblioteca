<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("head.php"); ?>
  <title>Registrar cuenta | BookStore</title>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crea una cuenta</h1>
              </div>
              <form class="user" id="frmRegistroUsuario" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="txtNombre" placeholder="Nombres">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" name="txtApellido" placeholder="Apellidos">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="txtIdentificacion" placeholder="Identificación">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" name="txtTelefono" placeholder="Teléfono">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="txtDireccion" placeholder="Dirección">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="txtCorreo" placeholder="Correo electrónico">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="txtPassword" placeholder="Contraseña">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" id="btnRegistrar" name="btnRegistrar">
                  Registrar Cuenta
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="recovery.php">¿Se te olvidó tu contraseña?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Modal User -->
  <?php include("modal.php"); ?>
  <!-- End of modal User -->

</body>

</html>