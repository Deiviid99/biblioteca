<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>Cambiar contraseña | BookStore</title>
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <?php
        if (isset($_GET['cod'])) {
        ?>
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
                                        <form class="user" id="frmCambiarClave" method="POST">
                                            <input type="hidden" class="form-control form-control-user" id="txtCodigoRecuperacion" name="txtCodigoRecuperacion" value="<?php echo $_GET['cod']; ?>">
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="exampleInputEmail" name="txtPassword" placeholder="Introduzca la nueva contraseña">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="exampleInputEmail" name="txtRepeatPassword" placeholder="Repita la contraseña">
                                            </div>
                                            <button class="btn btn-primary btn-user btn-block" id="btnCambiarClave" name="btnCambiarClave">
                                                Cambiar contraseña
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

        <?php } else {
            header("location: http://192.168.1.33:82/biblioteca/web/login.php");
        } ?>

    </div>

    <!-- Modal User -->
    <?php include("modal.php"); ?>
    <!-- End of modal User -->

</body>

</html>