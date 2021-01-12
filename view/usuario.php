<?php require_once("../controller/usuarioController.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>Libros | BookStore</title>
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
                <div class="container-fluid" id="tablaUsuario"></div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("footer.php"); ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Modal User -->
    <?php include("modal.php"); ?>
    <!-- End of modal User -->
</body>

</html>

<!-- Modal para Agregar -->
<div id="modalAgregarUsuario" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" id="frmAgregarUsuario" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Agregar Usuario</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="txtNombre" class="titulos_formularios">Nombres: </label>
                            <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese los nombres..." />
                            <div id="mensajeNombre" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                        <div class="col">
                            <label for="txtApellido" class="titulos_formularios">Apellidos: </label>
                            <input type="text" class="form-control" name="txtApellido" id="txtApellido" placeholder="Ingrese los apellidos..." />
                            <div id="mensajeApellido" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="txtIdentificacion" class="titulos_formularios">Identificación: </label>
                            <input type="text" class="form-control" name="txtIdentificacion" id="txtIdentificacion" placeholder="Ingrese la identificación..." />
                            <div id="mensajeIdentificacion" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                        <div class="col">
                            <label for="txtTelefono" class="titulos_formularios">Teléfono: </label>
                            <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" placeholder="Ingrese el teléfono..." />
                            <div id="mensajeTelefono" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="txtDireccion" class="titulos_formularios">Dirección: </label>
                        <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Ingrese la dirección..." />
                        <div id="mensajeDireccion" style="color: #DE0F0F; font-size: 12px;"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="txtCorreo" class="titulos_formularios">Correo: </label>
                            <input type="text" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Ingrese el correo electrónico..." />
                            <div id="mensajeCorreo" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                        <div class="col">
                            <label for="txtPassword" class="titulos_formularios">Contraseña: </label>
                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Ingrese la contraseña..." />
                            <div id="mensajePassword" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="cmbRol" class="titulos_formularios">Rol: </label>
                        <select class="form-control" name="cmbRol" id="cmbRol">
                            <option value="0">Seleccione un rol:</option>
                            <?php
                            $dato = new Usuario();
                            $rol = $dato->obtenerRol();
                            while ($row = mysqli_fetch_array($rol)) { ?>
                                <option value="<?php echo $row["ROL_ID"]; ?>"><?php echo $row["ROL_DESCRIPCION"]; ?></option>
                            <?php } ?>
                        </select>
                        <div id="mensajeRol" style="color: #DE0F0F; font-size: 12px;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="btnGuardarUsuario" id="btnGuardarUsuario">Guardar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                            <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal para Agregar -->
<div id="modalModificarUsuario" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" id="frmModificarUsuario" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Modificar Usuario</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="txtIdUsuario" id="txtIdUsuario">
                    <div class="row">
                        <div class="col">
                            <label for="txtNombreu" class="titulos_formularios">Nombres: </label>
                            <input type="text" class="form-control" name="txtNombreu" id="txtNombreu" placeholder="Ingrese los nombres..." />
                            <div id="mensajeNombreu" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                        <div class="col">
                            <label for="txtApellidou" class="titulos_formularios">Apellidos: </label>
                            <input type="text" class="form-control" name="txtApellidou" id="txtApellidou" placeholder="Ingrese los apellidos..." />
                            <div id="mensajeApellidou" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="txtIdentificacionu" class="titulos_formularios">Identificación: </label>
                            <input type="text" class="form-control" name="txtIdentificacionu" id="txtIdentificacionu" placeholder="Ingrese la identificación..." />
                            <div id="mensajeIdentificacionu" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                        <div class="col">
                            <label for="txtTelefonou" class="titulos_formularios">Teléfono: </label>
                            <input type="text" class="form-control" name="txtTelefonou" id="txtTelefonou" placeholder="Ingrese el teléfono..." />
                            <div id="mensajeTelefonou" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="txtDireccionu" class="titulos_formularios">Dirección: </label>
                        <input type="text" class="form-control" name="txtDireccionu" id="txtDireccionu" placeholder="Ingrese la dirección..." />
                        <div id="mensajeDireccionu" style="color: #DE0F0F; font-size: 12px;"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="txtCorreou" class="titulos_formularios">Correo: </label>
                            <input type="text" class="form-control" name="txtCorreou" id="txtCorreou" placeholder="Ingrese el correo electrónico..." />
                            <div id="mensajeCorreou" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                        <div class="col">
                            <label for="txtPasswordu" class="titulos_formularios">Contraseña: </label>
                            <input type="password" class="form-control" name="txtPasswordu" id="txtPasswordu" placeholder="Ingrese la contraseña..." />
                            <div id="mensajePasswordu" style="color: #DE0F0F; font-size: 12px;"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="cmbRolu" class="titulos_formularios">Rol: </label>
                        <select class="form-control" name="cmbRolu" id="cmbRolu">
                            <option value="0">Seleccione un rol:</option>
                            <?php
                            $dato = new Usuario();
                            $rol = $dato->obtenerRol();
                            while ($row = mysqli_fetch_array($rol)) { ?>
                                <option value="<?php echo $row["ROL_ID"]; ?>"><?php echo $row["ROL_DESCRIPCION"]; ?></option>
                            <?php } ?>
                        </select>
                        <div id="mensajeRolu" style="color: #DE0F0F; font-size: 12px;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="btnActualizarUsuario" id="btnActualizarUsuario">Actualizar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>