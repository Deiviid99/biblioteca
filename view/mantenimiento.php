<?php
require_once("../controller/libroController.php");
require_once("../controller/helperController.php");
?>
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

                <div class="container-fluid">

                    <?php
                    $idLibro = desencriptar($_GET['libro']);
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold">Mantenimiento de Libros</h6>
                            <a href="libro.php"><button class="btn btn-outline-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="cabecera_tabla">
                                        <tr>
                                            <th>N°</th>
                                            <th>ISBN</th>
                                            <th>Editorial</th>
                                            <th>Autor</th>
                                            <th>Título</th>
                                            <th>Año</th>
                                            <th>P.V.P</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #545454">
                                        <?php
                                        $dato = new Libro();
                                        $libro = $dato->obtenerLibro($idLibro);
                                        $cont = 0;
                                        while ($row = mysqli_fetch_array($libro)) {
                                            $cont = $cont + 1;
                                            $datos = $row["aut_id"] . "||" . $row["lib_id"] . "||" . $row["edi_id"] . "||" .  $row["lib_isbn"] . "||" . $row["lib_titulo"] . "||" . $row["lib_anio"] . "||" . $row["lib_precioventa"] . "||" . $row["aul_id"];
                                            $valores = $row["lib_id"] . "||" . $row["lib_precioventa"];
                                        ?>
                                            <tr>
                                                <td><?php echo $cont; ?></td>
                                                <td><?php echo $row['lib_isbn']; ?></td>
                                                <td><?php echo $row['edi_nombre']; ?></td>
                                                <td><?php echo $row['aut_nombre'] . ' ' . $row['aut_apellido']; ?></td>
                                                <td><?php echo $row['lib_titulo']; ?></td>
                                                <td><?php echo $row['lib_anio']; ?></td>
                                                <td>$<?php echo $row['lib_precioventa']; ?></td>
                                                <td>
                                                    <button class="btn btn-outline-warning" data-toggle="modal" data-target="#modalModificarLibro" onclick="obtenerDatosActualizarLibro('<?php echo $datos ?>')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                        </svg>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-danger" onclick="eliminarLibroAutor('<?php echo $row['lib_id'] ?>','<?php echo $row['aut_id'] ?>')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer -->
            <?php include("footer.php"); ?>
            <!-- End of Footer -->
        </div>
    </div>
    <!-- End of Content Wrapper -->
    <!-- Modal User -->
    <?php include("modal.php"); ?>
    <!-- End of modal User -->
</body>

</html>

<!-- Modal para Editar -->
<div id="modalModificarLibro" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form method="POST" id="frmModificarLibro" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #F9F9F9;">
                    <h6 class="modal-title" style="color: black; font-weight: bold;">Modificar Libro</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="txtIdLibro" id="txtIdLibro" />
                    <input type="hidden" class="form-control" name="txtIdLibroAutor" id="txtIdLibroAutor" />
                    <div class="row">
                        <div class="col">
                            <label for="" style="font-weight: bold;">Editorial: </label>
                            <select class="form-control" name="cmbEditorialu" id="cmbEditorialu">
                                <option value="0">Seleccione una editorial</option>
                                <?php
                                $dato = new Libro();
                                $editorial = $dato->obtenerEditorial();
                                while ($row = mysqli_fetch_array($editorial)) { ?>
                                    <option value="<?php echo $dt = $row["EDI_ID"]; ?>"><?php echo $row["EDI_NOMBRE"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" style="font-weight: bold;">ISBN: </label>
                            <input type="text" class="form-control" name="txtIsbnu" id="txtIsbnu" />
                        </div>
                    </div>
                    <hr>
                    <div>
                        <label for="" style="font-weight: bold;">Título: </label>
                        <input type="text" class="form-control" name="txtTitulou" id="txtTitulou" />
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="" style="font-weight: bold;">Año: </label>
                            <input type="text" class="form-control" name="txtAniou" id="txtAniou" />
                        </div>
                        <div class="col">
                            <label for="" style="font-weight: bold;">$P.V.P: </label>
                            <div class="input-group mb-2">
                                <div class="input-group-addon">
                                    $
                                </div>
                                <input type="text" class="form-control" name="txtPrecioVentau" id="txtPrecioVentau" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Autor: </label>
                        <br>
                        <select class="form-control" name="cmbAutoresu" id="cmbAutoresu">
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
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" name="btnActualizarLibro" id="btnActualizarLibro">Actualizar <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                        </svg></button>
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal" name="btnAgregarLibro" id="btnAgregarLibro">Agregar Autor <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                            <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Page level plugins -->
<script src="../template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../template/js/demo/datatables-demo.js"></script>