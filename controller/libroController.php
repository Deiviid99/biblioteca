<?php
include("../model/conexion.php");

class Libro
{
    function obtenerLibro($idLibro)
    {
        $con = Conexion();
        $sql = "CALL stp_obtenerlibro('$idLibro')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        }
    }

    function guardarLibro()
    {
        $con = Conexion();
        $editorial = $_POST['cmbEditorial'];
        $isbn = trim($_POST['txtIsbn']);
        $titulo = trim($_POST['txtTitulo']);
        $anio = trim($_POST['txtAnio']);
        $precioventa = trim($_POST['txtPrecioVenta']);
        $autor = $_POST['cmbAutores'];

        if ($editorial == "" || $editorial == "0" || $isbn == "" || $titulo == "" || $anio == "" || $precioventa == "") {
            echo "1";
        } else {
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_registrarlibro('$editorial','$isbn','$titulo','$anio','$precioventa')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if ($result) {
                $con = Conexion();
                foreach ($autor as $idautor) {
                    $sqlAutorlibro = "CALL stp_registrarautorlibro('$idautor')";
                    $resultAutorLibro = mysqli_query($con, $sqlAutorlibro);
                }
                $con->close();
                if ($resultAutorLibro) {
                    echo "2";
                }
            }
        }
    }

    function guardarLibroAutor()
    {
        $con = Conexion();
        $libro = $_POST['txtIdLibro'];
        $autor = $_POST['cmbAutoresu'];

        $sqlValidar = "CALL stp_validar_autorlibro('$autor','$libro')";
        $resultValidar = mysqli_query($con, $sqlValidar);
        $con->close();
        if (mysqli_num_rows($resultValidar) > 0) {
            echo "1";
        } else {
            $con = Conexion();
            $sql = "CALL stp_registrarautor_libro('$autor','$libro')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if ($result) {
                echo "2";
            }
        }
    }

    function modificarLibro()
    {
        $con = Conexion();
        $autorLibro = $_POST['txtIdLibroAutor'];
        $libro = $_POST['txtIdLibro'];
        $autor = $_POST['cmbAutoresu'];
        $editorial = $_POST['cmbEditorialu'];
        $isbn = trim($_POST['txtIsbnu']);
        $titulo = trim($_POST['txtTitulou']);
        $anio = trim($_POST['txtAniou']);
        $precioventa = trim($_POST['txtPrecioVentau']);

        $sqlValidar = "CALL stp_validar_autorlibro('$autor','$libro')";
        $resultValidar = mysqli_query($con, $sqlValidar);
        $con->close();
        if (mysqli_num_rows($resultValidar) > 0) {
            echo "1";
        } else {
            $con = Conexion();
            $sql = "CALL stp_modificarlibro('$autor','$libro','$editorial','$autorLibro','$isbn','$titulo','$anio','$precioventa')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if ($result) {
                echo "2";
            }
        }
    }

    function eliminarLibro()
    {
        $con = Conexion();
        $idLibro = $_POST['idLibro'];
        $sql = "CALL stp_eliminar_libro('$idLibro')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "1";
        }
    }

    function eliminarLibroAutor()
    {
        $con = Conexion();
        $idLibro = $_POST['idLibro'];
        $idAutor = $_POST['idAutor'];

        $sqlValidar = "CALL stp_validar_autorlibros('$idLibro')";
        $resultValidar = mysqli_query($con, $sqlValidar);
        $con->close();

        if (mysqli_num_rows($resultValidar) > 1) {
            $con = Conexion();
            $sql = "CALL stp_eliminar_varioslibros('$idAutor','$idLibro')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if ($result) {
                echo "1";
            }
        } else {
            $con = Conexion();
            $sql = "CALL stp_eliminarlibro('$idAutor','$idLibro')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if ($result) {
                echo "2";
            }
        }
    }

    function actualizarPVP()
    {
        $con = Conexion();
        $porcentaje = trim($_POST['txtPorcentajePVP']);
        $opcion = $_POST['chkOpcion'];

        $sql = "CALL stp_obtener_libros()";
        $result = mysqli_query($con, $sql);
        $con->close();
        if ($opcion == "mas") {
            if (mysqli_num_rows($result) > 0) {
                $con = Conexion();
                while ($row = mysqli_fetch_array($result)) {
                    $valor = 0;
                    $idLibro = $row["LIB_ID"];
                    $pvp = $row["LIB_PRECIOVENTA"];

                    $calculoporcentaje = (floatval($pvp) * floatval($porcentaje)) / 100;
                    $valor = number_format(floatval($pvp) + $calculoporcentaje, 2, '.', '');

                    $sqlUpdate = "CALL stp_modificar_pvplibros('$idLibro','$valor')";
                    $resultUpdate = mysqli_query($con, $sqlUpdate);
                }
                $con->close();
                if ($resultUpdate) {
                    echo "1";
                }
            } else {
                echo "2";
            }
        } else {
            if (mysqli_num_rows($result) > 0) {
                $con = Conexion();
                while ($row = mysqli_fetch_array($result)) {
                    $valor = 0;
                    $idLibro = $row["LIB_ID"];
                    $pvp = $row["LIB_PRECIOVENTA"];

                    $calculoporcentaje = (floatval($pvp) * floatval($porcentaje)) / 100;
                    $valor = number_format(floatval($pvp) - $calculoporcentaje, 2, '.', '');
                    if ($valor > 0) {
                        $sqlUpdate = "CALL stp_modificar_pvplibros('$idLibro','$valor')";
                        $resultUpdate = mysqli_query($con, $sqlUpdate);
                    } else {
                        $resultUpdate = null;
                    }
                }
                $con->close();
                if ($resultUpdate != null) {
                    echo "1";
                } else {
                    echo "3";
                }
            } else {
                echo "2";
            }
        }
    }

    function actualizarPVPLibro()
    {
        $porcentaje = trim($_POST['txtPorcentajePVPLibro']);
        $pvpLibro = $_POST['txtPVPLibro'];
        $idPVPLibro = $_POST['txtIdPVPLibro'];
        $opcion = $_POST['chkOpcionLibro'];

        if ($opcion == "mas") {
            $con = Conexion();
            $valor = 0;
            $calculoporcentaje = (floatval($pvpLibro) * floatval($porcentaje)) / 100;
            $valor = number_format(floatval($pvpLibro) + $calculoporcentaje, 2, '.', '');

            $sqlUpdate = "CALL stp_modificar_pvplibros('$idPVPLibro','$valor')";
            $resultUpdate = mysqli_query($con, $sqlUpdate);
            $con->close();
            if ($resultUpdate) {
                echo "1";
            }
        } else {
            $con = Conexion();
            $valor = 0;
            $calculoporcentaje = (floatval($pvpLibro) * floatval($porcentaje)) / 100;
            $valor = number_format(floatval($pvpLibro) - $calculoporcentaje, 2, '.', '');
            if ($valor > 0) {
                $sqlUpdate = "CALL stp_modificar_pvplibros('$idPVPLibro','$valor')";
                $resultUpdate = mysqli_query($con, $sqlUpdate);
                $con->close();
                if ($resultUpdate) {
                    echo "1";
                }
            } else {
                echo "2";
            }
        }
    }

    function obtenerAutor()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        //EJECUTO PROCEDIMIENTO ALMACENADO
        $sql = "CALL stp_obtener_autores()";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        }
    }

    function obtenerEditorial()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        //EJECUTO PROCEDIMIENTO ALMACENADO
        $sql = "CALL stp_obtener_editoriales()";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        }
    }

    function obtenerCatalogo()
    {
        $con = Conexion();
        $sql = "CALL stp_obtenercatalogo()";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        }
    }

    function obtenerCatalogoLibro($idLibro)
    {
        $con = Conexion();
        $sql = "CALL stp_obtenercatalogo_libro('$idLibro')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        }
    }

    function obtenerCatalogoAutor($idLibro)
    {
        $con = Conexion();
        $sql = "CALL stp_obtenercatalogo_autor('$idLibro')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        }
    }
}

/*---------------------LLAMADA DESDE LOS BOTONES PARA QUE EJECUTEN CRUD--------------------------------*/
$data = new Libro();
if (isset($_GET["add"])) {
    $data->guardarLibro();
} else if (isset($_GET["add2"])) {
    $data->guardarLibroAutor();
} else if (isset($_GET["edit"])) {
    $data->modificarLibro();
} else if (isset($_GET["delete"])) {
    $data->eliminarLibro();
} else if (isset($_GET["delete2"])) {
    $data->eliminarLibroAutor();
} else if (isset($_GET["price"])) {
    $data->actualizarPVP();
} else if (isset($_GET["pricelibro"])) {
    $data->actualizarPVPLibro();
}
