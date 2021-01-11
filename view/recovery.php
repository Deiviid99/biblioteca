<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("head.php"); ?>
  <title>Recuperar contraseña | BookStore</title>
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
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
                    <p class="mb-4">Lo entendemos, pasan cosas. Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña.</p>
                  </div>
                  <form class="user" id="frmRecuperarClave" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="txtCorreo" aria-describedby="emailHelp" placeholder="Introduzca la dirección de correo electrónico...">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" id="btnRecuperar" name="btnRecuperar">
                      Restablecer la contraseña
                    </button>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="register.php">¡Crea una cuenta!</a>
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

    </div>

  </div>

  <!-- Modal User -->
  <?php include("modal.php"); ?>
  <!-- End of modal User -->

</body>

</html>