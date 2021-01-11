<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <title>Inicio | BookStore</title>
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
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4" align="center">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">BIENVENIDO/A AL SISTEMA</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-6">
                                <img src="<?php echo URL; ?>/template/img/home.jpg" alt="" width="100%" height="100%">
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
    <!-- End of Page Wrapper -->

    <!-- Modal User -->
    <?php include("modal.php"); ?>
    <!-- End of modal User -->
</body>

</html>