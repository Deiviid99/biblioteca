<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("head.php"); ?>
  <title>Inicio de Sesión | BookStore</title>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido - Inicio de sesión</h1>
                  </div>
                  <form class="user" id="frmLogin" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="txtCorreo" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Introduzca la dirección de correo electrónico...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="txtPassword" id="exampleInputPassword" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recordarme</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" id="btnLogin" name="btnLogin">
                      Iniciar sesión
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="recovery.php">¿Se te olvidó tu contraseña?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">¡Crea una cuenta!</a>
                  </div>
                </div>
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