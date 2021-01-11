<?php require_once("../controller/libroController.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>Catálogo | BookStore</title>
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold ">Catálogo de Libros</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="text-align: center;" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="cabecera_tabla">
                                        <tr>
                                            <th style="width: 70px;">N°</th>
                                            <th style="width: 250px;">ISBN</th>
                                            <th>Título</th>
                                            <th style="width: 150px;">Información</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: #545454">
                                        <?php
                                        $dato = new Libro();
                                        $catalogo = $dato->obtenerCatalogo();
                                        $cont = 0;
                                        while ($row = mysqli_fetch_array($catalogo)) {
                                            $cont = $cont + 1;
                                        ?>
                                            <tr>
                                                <td><?php echo $cont; ?></td>
                                                <td><?php echo $row['LIB_ISBN']; ?></td>
                                                <td><?php echo $row['LIB_TITULO'] ?></td>
                                                <td>
                                                    <a href="catalogolibro.php?libro=<?php echo $row['LIB_ID'] ?>"><button type="button" class="btn btn-outline-warning">
                                                            <img src="../template/img/librotable.png" style="width: 30px; height: 32px;" alt="">
                                                        </button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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