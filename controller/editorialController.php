<?php
include("../model/conexion.php");

class Editorial
{
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

    function guardarEditorial()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        $nombreEditorial = trim($_POST['txtNombreEditorial']);

        if ($nombreEditorial == "") {
            echo "1";
        } else {
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_registrareditorial('$nombreEditorial')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "2";
            }
        }
    }

    function modificarEditorial()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        $idEditorial = $_POST['txtIdEditorial'];
        $nombreEditorial = trim($_POST['txtNombreEditorialu']);
        if ($nombreEditorial == "") {
            echo "1";
        } else {
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_modificareditorial('$idEditorial','$nombreEditorial')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "2";
            }
        }
    }

    function eliminarEditorial()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        $idEditorial = $_POST['idEditorial'];
        //EJECUTO PROCEDIMIENTO ALMACENADO
        $sqlValidar = "CALL stp_validareditorial_libro('$idEditorial')";
        $resultValidar = mysqli_query($con, $sqlValidar);
        $con->close();
        if (mysqli_num_rows($resultValidar) > 0) {
            echo "1";
        } else {
            //INSTANCIO LA CONEXION BD
            $con = Conexion();
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_eliminareditorial('$idEditorial')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if ($result) {
                echo "2";
            }
        }
    }
}
/*---------------------LLAMADA DESDE LOS BOTONES PARA QUE EJECUTEN CRUD--------------------------------*/
$data = new Editorial();
if (isset($_GET["add"])) {
    $data->guardarEditorial();
} else if (isset($_GET["edit"])) {
    $data->modificarEditorial();
} else if (isset($_GET["delete"])) {
    $data->eliminarEditorial();
}
