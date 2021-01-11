<?php require_once("../controller/libroController.php"); ?>
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
                <div class="container-fluid" id="tablaLibro"></div>
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
<div id="modalAgregarLibro" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" id="frmAgregarLibro" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #F9F9F9;">
                    <h6 class="modal-title" style="color: black; font-weight: bold;">Agregar Libro</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="" class="titulos_formularios">Editorial: </label>
                            <select class="form-control" name="cmbEditorial" id="cmbEditorial">
                                <option value="0">Seleccione una editorial</option>
                                <?php
                                $dato = new Libro();
                                $editorial = $dato->obtenerEditorial();
                                while ($row = mysqli_fetch_array($editorial)) { ?>
                                    <option value="<?php echo $row["EDI_ID"]; ?>"><?php echo $row["EDI_NOMBRE"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="titulos_formularios">ISBN: </label>
                            <input type="text" class="form-control" name="txtIsbn" id="txtIsbn" placeholder="Ingrese el ISBN del libro..." />
                        </div>
                    </div>
                    <hr>
                    <div>
                        <label for="" class="titulos_formularios">Título: </label>
                        <input type="text" class="form-control" name="txtTitulo" id="txtTitulo" placeholder="Ingrese el título del libro..." />
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="" class="titulos_formularios">Año: </label>
                            <input type="text" class="form-control" name="txtAnio" id="txtAnio" placeholder="Ingrese el año del libro..." />
                        </div>
                        <div class="col">
                            <label for="" class="titulos_formularios">$P.V.P: </label>
                            <div class="input-group mb-2">
                                <div class="input-group-addon">
                                    $
                                </div>
                                <input type="text" class="form-control" name="txtPrecioVenta" id="txtPrecioVenta" placeholder="0.00" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="" class="titulos_formularios">Autor: </label>
                        <br>
                        <select multiple class="form-control" name="cmbAutores[]" id="cmbAutores">
                            <?php
                            $dato = new Libro();
                            $autores = $dato->obtenerAutor();
                            while ($row = mysqli_fetch_array($autores)) { ?>
                                <option value="<?php echo $row["AUT_ID"]; ?>"><?php echo $row["AUT_NOMBRE"] . " " . $row["AUT_APELLIDO"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #F9F9F9;">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="btnGuardarLibro" id="btnGuardarLibro">Guardar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                            <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                        </svg>
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal para Editar PVP -->
<div id="modalCambiarPVP" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <form method="POST" id="frmModificarPVP" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #F9F9F9;">
                    <h6 class="modal-title" style="color: black; font-weight: bold;">Cambiar P.V.P de los libros</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="col">
                            <label for="" class="titulos_formularios">Porcentaje: </label>
                            <div class="input-group mb-2">
                                <div class="input-group-addon">
                                    %
                                </div>
                                <input type="text" class="form-control" name="txtPorcentajePVP" id="txtPorcentajePVP" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="chkOpcion" id="gridRadios1" value="mas" checked>
                                <label class="titulos_checkbox" for="gridRadios1">
                                    Incrementar (+);
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="chkOpcion" id="gridRadios2" value="menos">
                                <label class="titulos_checkbox" for="gridRadios2">
                                    Disminuir (-);
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #F9F9F9;">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="btnActualizarPVP" id="btnActualizarPVP">Aplicar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                        </svg></button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal para Editar PVP -->
<div id="modalCambiarPVPLibro" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <form method="POST" id="frmModificarPVPLibro" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #F9F9F9;">
                    <h6 class="modal-title" style="color: black; font-weight: bold;">Cambiar P.V.P del libro</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="txtIdPVPLibro" id="txtIdPVPLibro" />
                    <input type="hidden" class="form-control" name="txtPVPLibro" id="txtPVPLibro" />
                    <div class="form-group">
                        <div class="col">
                            <label for="" class="titulos_formularios">Porcentaje: </label>
                            <div class="input-group mb-2">
                                <div class="input-group-addon">
                                    %
                                </div>
                                <input type="text" class="form-control" name="txtPorcentajePVPLibro" id="txtPorcentajePVPLibro" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="chkOpcionLibro" id="gridRadios" value="mas" checked>
                                <label class="titulos_checkbox" for="gridRadios">
                                    Incrementar (+);
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="chkOpcionLibro" id="gridRadios3" value="menos">
                                <label class="titulos_checkbox" for="gridRadios3">
                                    Disminuir (-);
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #F9F9F9;">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="btnActualizarPVPLibro" id="btnActualizarPVPLibro">Aplicar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                        </svg></button>
                </div>
            </div>
        </form>
    </div>
</div>