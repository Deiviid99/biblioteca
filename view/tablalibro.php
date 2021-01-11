<?php require_once("../controller/libroController.php");
session_start();
if (isset($_SESSION["rol"]) && $_SESSION["rol"] == 1) { ?>
    <div class="card shadow mb-4">
        <div class="card-header d-flex flex-row align-items-center">
            <div class="mb-1 col-lg-11">
                <h6 class="m-0 font-weight-bold ">Registro de Libros </h6>
            </div>
            <div class="flex-row align-items-between">
                <div class="mb-1">
                    <button class="btn btn-outline-success" data-toggle="modal" data-target="#modalCambiarPVP">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                        </svg>
                    </button>
                    <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarLibro">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
                    <thead class="cabecera_tabla">
                        <tr>
                            <th style="width: 70px;">N°</th>
                            <th style="width: 100px;">ISBN</th>
                            <th style="width: 100px;">Editorial</th>
                            <th>Autor(es)</th>
                            <th>Título</th>
                            <th style="width: 80px;">Año</th>
                            <th>P.V.P</th>
                            <th style="width: 94px;">Config</th>
                            <th style="width: 94px;">Quitar</th>
                        </tr>
                    </thead>
                    <tbody style="color: #545454">
                        <?php
                        $dato = new Libro();
                        $libro = $dato->obtenerCatalogo();
                        $cont = 0;
                        while ($row = mysqli_fetch_array($libro)) {
                            $idlibro = $row['LIB_ID'];
                            $cont = $cont + 1;
                            $valores = $row["LIB_ID"] . "||" . $row["LIB_PRECIOVENTA"];
                        ?>
                            <tr>
                                <td><?php echo $cont; ?></td>
                                <td><?php echo $row['LIB_ISBN']; ?></td>
                                <td><?php echo $row['EDI_NOMBRE']; ?></td>
                                <td style="text-align: left;">
                                    <?php
                                    $autores = $dato->obtenerCatalogoAutor($idlibro);
                                    while ($dt = mysqli_fetch_array($autores)) { ?>
                                        <li><?php echo $dt['AUT_NOMBRE'] . ' ' . $dt['AUT_APELLIDO'];  ?></li>
                                    <?php } ?>
                                </td>
                                <td><?php echo $row['LIB_TITULO']; ?></td>
                                <td><?php echo $row['LIB_ANIO']; ?></td>
                                <td><button class="btn btn-outline-success" style="font-size: 15px;" data-toggle="modal" data-target="#modalCambiarPVPLibro" onclick="obtenerDatosActualizarLibroPVP('<?php echo $valores ?>')">$<?php echo $row['LIB_PRECIOVENTA']; ?></button></td>
                                <td>
                                    <a href="mantenimiento.php?libro=<?php echo $idlibro; ?>"><button class="btn btn-outline-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger" onclick="eliminarLibro('<?php echo $row['LIB_ID'] ?>')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg> </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="card shadow mb-4">
        <div class="card-header d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold ">Registro de Libros </h6>
            <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarLibro">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
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
                            <th style="width: 100px;">ISBN</th>
                            <th style="width: 100px;">Editorial</th>
                            <th>Autor(es)</th>
                            <th>Título</th>
                            <th style="width: 80px;">Año</th>
                            <th>P.V.P</th>
                            <th style="width: 94px;">Config</th>
                            <th style="width: 94px;">Quitar</th>
                        </tr>
                    </thead>
                    <tbody style="color: #545454">
                        <?php
                        $dato = new Libro();
                        $libro = $dato->obtenerCatalogo();
                        $cont = 0;
                        while ($row = mysqli_fetch_array($libro)) {
                            $idlibro = $row['LIB_ID'];
                            $cont = $cont + 1;
                        ?>
                            <tr>
                                <td><?php echo $cont; ?></td>
                                <td><?php echo $row['LIB_ISBN']; ?></td>
                                <td><?php echo $row['EDI_NOMBRE']; ?></td>
                                <td style="text-align: left;">
                                    <?php
                                    $autores = $dato->obtenerCatalogoAutor($idlibro);
                                    while ($dt = mysqli_fetch_array($autores)) { ?>
                                        <li><?php echo $dt['AUT_NOMBRE'] . ' ' . $dt['AUT_APELLIDO'];  ?></li>
                                    <?php } ?>
                                </td>
                                <td><?php echo $row['LIB_TITULO']; ?></td>
                                <td><?php echo $row['LIB_ANIO']; ?></td>
                                <td><?php echo $row['LIB_PRECIOVENTA']; ?></td>
                                <td>
                                    <a href="mantenimiento.php?libro=<?php echo $idlibro; ?>"><button class="btn btn-outline-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                            </svg>
                                        </button></a>
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger" onclick="eliminarLibro('<?php echo $row['LIB_ID'] ?>')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
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
<?php } ?>
<!-- Page level plugins -->
<script src="http://192.168.1.33:82/biblioteca/template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="http://192.168.1.33:82/biblioteca/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://192.168.1.33:82/biblioteca/template/js/demo/datatables-demo.js"></script>