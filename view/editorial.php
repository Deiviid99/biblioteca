<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>Editoriales | BookStore</title>
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
                <div class="container-fluid" id="tablaEditorial"></div>
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
<div id="modalAgregarEditorial" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" id="frmAgregarEditorial" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Agregar Editorial</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <label for="txtNombreEditorial" class="titulos_formularios">Nombre de Editorial: </label>
                    <input type="text" class="form-control from-control-user" maxlength="80" name="txtNombreEditorial" id="txtNombreEditorial" placeholder="Ingrese el nombre de la editorial..." />
                    <div id="mensajeEditorial" style="color: #DE0F0F; font-size: 12px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="btnGuardarEditorial" id="btnGuardarEditorial">Guardar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                            <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal para Editar -->
<div id="modalModificarEditorial" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form method="POST" id="frmModificarEditorial" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Modificar Editorial</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="txtIdEditorial" id="txtIdEditorial" />
                    <label for="txtNombreEditorialu" class="titulos_formularios">Nombre de Editorial: </label>
                    <input type="text" class="form-control" name="txtNombreEditorialu" id="txtNombreEditorialu" placeholder="Ingrese el nombre de la editorial..." />
                    <div id="mensajeEditorialu" style="color: #DE0F0F; font-size: 12px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="btnActualizarEditorial" id="btnActualizarEditorial">Actualizar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                        </svg></button>
                </div>
            </div>
        </form>
    </div>
</div>