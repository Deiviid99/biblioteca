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

                <div class="container-fluid">
                    <?php
                    $idLibro = $_GET['libro'];
                    $dato = new Libro();
                    $catalogo = $dato->obtenerCatalogoLibro($idLibro);
                    $catalogoautor = $dato->obtenerCatalogoAutor($idLibro);
                    ?>
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold">Catálogo de Libros</h6>
                            <a href="catalogo.php"><button class="btn btn-outline-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </button>
                            </a>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <img style="width: 100%; height: 100%; border-radius: 3rem;" src="../template/img/catalogo.jpg" alt="">
                                </div>
                                <?php while ($row = mysqli_fetch_array($catalogo)) { ?>
                                    <div class="col-sm-6">
                                        <div class="form-row" style="background-color: #f8f9fc;">
                                            <div class="form-group col-md-6">
                                                <label for="" style="text-align: justify;"><strong>ISBN: </strong><br>
                                                    <?php echo $row['LIB_ISBN'] ?>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="" style="text-align: justify;"><strong>Editorial: </strong><br>
                                                    <?php echo $row['EDI_NOMBRE'] ?>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row" style="background-color: #f8f9fc;">
                                            <div class="form-group col-md-6">
                                                <label for="" style="text-align: justify;"><strong>Título: </strong><br>
                                                    <?php echo $row['LIB_TITULO'] ?>
                                                </label>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="" style="text-align: justify;"><strong>Año: </strong><br>
                                                    <?php echo $row['LIB_ANIO'] ?>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="form-group col-md-12" style="background-color: #f8f9fc;">
                                                <div align="center">
                                                    <strong>Autor(es): </strong><br>
                                                </div>
                                                <label for="" style="text-align: justify;">
                                                    <?php while ($rs = mysqli_fetch_array($catalogoautor)) {  ?>
                                                        <li><?php echo $rs['AUT_NOMBRE'] . ' ' . $rs['AUT_APELLIDO']; ?></li>
                                                    <?php } ?>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div style="font-size: 30px; color: green; background-color: #f8f9fc;" align=" center">
                                            <label for=""><strong>$ <?php echo $row['LIB_PRECIOVENTA'] ?></strong></label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>

                </div>
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