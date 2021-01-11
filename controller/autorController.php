<?php

include("../model/conexion.php");

class Autor
{
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

    function guardarAutor()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        $nombreAutor = trim($_POST["txtNombreAutor"]);
        $apellidoAutor = trim($_POST["txtApellidoAutor"]);

        if ($nombreAutor == "" || $apellidoAutor == "") {
            echo "1";
        } else {
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_registrarautor('$nombreAutor', '$apellidoAutor')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "2";
            }
        }
    }

    function modificarAutor()
    {
        //INSTANCIO CONEXION BD
        $con = Conexion();
        $idAutor = $_POST['txtIdAutor'];
        $nombreAutor = trim($_POST['txtNombreAutoru']);
        $apellidoAutor = trim($_POST['txtApellidoAutoru']);
        if ($nombreAutor == "" || $apellidoAutor == "") {
            echo "1";
        } else {
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_modificarautor('$idAutor','$nombreAutor', '$apellidoAutor')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "2";
            }
        }
    }

    function eliminarAutor()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        $idAutor = $_POST['idAutor'];
        //EJECUTO PROCEDIMIENTO ALMACENADO
        $sqlValidar = "CALL stp_validarautor_libro('$idAutor')";
        $resultValidar = mysqli_query($con, $sqlValidar);
        $con->close();
        if (mysqli_num_rows($resultValidar) > 0) {
            echo "1";
        } else {
            //INSTANCIO LA CONEXION BD
            $con = Conexion();
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_eliminarautor('$idAutor')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if ($result) {
                echo "2";
            }
        }
    }
}
/*---------------------LLAMADA DESDE LOS BOTONES PARA QUE EJECUTEN CRUD--------------------------------*/
$data = new Autor();
if (isset($_GET["add"])) {
    $data->guardarAutor();
} else if (isset($_GET["edit"])) {
    $data->modificarAutor();
} else if (isset($_GET["delete"])) {
    $data->eliminarAutor();
}
