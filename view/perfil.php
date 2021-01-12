<?php require_once("../controller/usuarioController.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>Perfil | BookStore</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Menu User -->
        <?php include("menu.php"); ?>
        <!-- End of Menu User -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Navbar User -->
                <?php include("navbar.php"); ?>
                <!-- End of Navbar User -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block"><img src="../template/img/perfil.jpg" width="110%" height="100%" alt=""></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Actualización de datos</h1>
                                        </div>
                                        <form class="user" id="frmRegistroUsuario" method="POST">
                                            <?php
                                            $dato = new Usuario();
                                            $perfil = $dato->obtenerUsuarioPerfil($_SESSION['idUsuario']);
                                            while ($row = mysqli_fetch_array($perfil)) { ?>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="txtNombre" placeholder="Nombres" value="<?php echo $row['USU_NOMBRE']; ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" id="exampleLastName" name="txtApellido" placeholder="Apellidos" value="<?php echo $row['USU_APELLIDO']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" name="txtIdentificacion" placeholder="Identificación" value="<?php echo $row['USU_IDENTIFICACION']; ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-user" id="exampleLastName" name="txtTelefono" placeholder="Teléfono" value="<?php echo $row['USU_TELEFONO']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="txtDireccion" placeholder="Dirección" value="<?php echo $row['USU_DIRECCION']; ?>">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="txtCorreo" placeholder="Correo electrónico" value="<?php echo $row['USU_CORREO']; ?>">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="txtPassword" placeholder="Contraseña" value="<?php echo $row['USU_PASSWORD']; ?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <button class="btn btn-primary btn-user btn-block" id="btnActualizarPerfil" name="btnActualizarPerfil">
                                                Actualizar Datos
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("footer.php"); ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- Modal User -->
    <?php include("modal.php"); ?>
    <!-- End of modal User -->
</body>

</html>

<!-- Page level plugins -->
<script src="../template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../template/js/demo/datatables-demo.js"></script>