<?php require_once("../controller/editorialController.php"); ?>
<div class="card shadow mb-4">
    <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold ">Registro de Editoriales</h6>
        <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarEditorial">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
                <thead class="cabecera_tabla">
                    <tr>
                        <th style="width: 70px;">N°</th>
                        <th>Nombre de la Editorial</th>
                        <th style="width: 110px;">Editar</th>
                        <th style="width: 110px;">Eliminar</th>
                    </tr>
                </thead>
                <tbody style="color: #545454">
                    <?php
                    $dato = new Editorial();
                    $editorial = $dato->obtenerEditorial();
                    $cont = 0;
                    while ($row = mysqli_fetch_array($editorial)) {
                        $cont = $cont + 1;
                        $datos = $row["EDI_ID"] . "||" . $row["EDI_NOMBRE"];
                    ?>
                        <tr>
                            <td><?php echo $cont; ?></td>
                            <td><?php echo $row['EDI_NOMBRE']; ?></td>
                            <td>
                                <button class="btn btn-outline-warning" data-toggle="modal" data-target="#modalModificarEditorial" onclick="obtenerDatosActualizarEditorial('<?php echo $datos ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger" onclick="eliminarEditorial('<?php echo $row['EDI_ID'] ?>')">
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
<!-- Page level plugins -->
<script src="http://192.168.1.33:82/biblioteca/template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="http://192.168.1.33:82/biblioteca/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://192.168.1.33:82/biblioteca/template/js/demo/datatables-demo.js"></script>