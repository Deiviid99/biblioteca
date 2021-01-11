<?php
include("../model/conexion.php");
include("helperController.php");

class Usuario
{

    function obtenerUsuario()
    {
        $con = Conexion();
        $sql = "SELECT u.*,r.* FROM tbl_usuario u, tbl_rol r WHERE u.rol_id = r.rol_id AND u.usu_estado = 'A' AND r.rol_estado ='A'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        }
    }

    function registrarUsuario()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        //DECLARACION DE VARIABLES INICIALIZADAS POR CAMPOS DE TIPO POST
        $nombre = trim($_POST['txtNombre']);
        $apellido = trim($_POST['txtApellido']);
        $identificacion = trim($_POST['txtIdentificacion']);
        $telefono = trim($_POST['txtTelefono']);
        $direccion = trim($_POST['txtDireccion']);
        $correo = trim($_POST['txtCorreo']);
        $password = md5($_POST['txtPassword']);
        //ASIGANMOS EL CODIGO PARA LA RECUPERACION DE LA CLAVE
        $codigorecuperacion = codigoRandom();
        if ($nombre == "" || $apellido == "" || $identificacion == "" || $telefono == "" || $direccion == "" || $correo == "" || $password == "") {
            echo "3";
        } else {
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_validarusuarios_registrocorreo('$correo')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if (mysqli_num_rows($result) > 0) {
                echo "1";
            } else {
                //INSTANCIO LA CONEXION BD
                $con = Conexion();
                //EJECUTO PROCEDIMIENTO ALMACENADO
                $sqlRegistro = "CALL stp_registrarusuario('$codigorecuperacion','2','$nombre','$apellido','$correo','$password','$identificacion','$telefono','$direccion')";
                $resultRegistro = mysqli_query($con, $sqlRegistro);
                $con->close();
                if ($resultRegistro) {
                    echo "2";
                }
            }
        }
    }

    function guardarUsuario()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        //DECLARACION DE VARIABLES INICIALIZADAS POR CAMPOS DE TIPO POST
        $nombre = trim($_POST['txtNombre']);
        $apellido = trim($_POST['txtApellido']);
        $identificacion = trim($_POST['txtIdentificacion']);
        $telefono = trim($_POST['txtTelefono']);
        $direccion = trim($_POST['txtDireccion']);
        $correo = trim($_POST['txtCorreo']);
        $password = md5($_POST['txtPassword']);
        $rol = $_POST["cmbRol"];
        //ASIGANMOS EL CODIGO PARA LA RECUPERACION DE LA CLAVE
        $codigorecuperacion = codigoRandom();
        if ($nombre == "" || $apellido == "" || $identificacion == "" || $telefono == "" || $direccion == "" || $correo == "" || $password == "" || $rol == "0") {
            echo "3";
        } else {
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_validarusuarios_registrocorreo('$correo')";
            $result = mysqli_query($con, $sql);
            $con->close();
            if (mysqli_num_rows($result) > 0) {
                echo "1";
            } else {
                //INSTANCIO LA CONEXION BD
                $con = Conexion();
                //EJECUTO PROCEDIMIENTO ALMACENADO
                $sqlRegistro = "CALL stp_registrarusuario('$codigorecuperacion','$rol','$nombre','$apellido','$correo','$password','$identificacion','$telefono','$direccion')";
                $resultRegistro = mysqli_query($con, $sqlRegistro);
                $con->close();
                if ($resultRegistro) {
                    echo "2";
                }
            }
        }
    }

    function modificarUsuario()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        //DECLARACION DE VARIABLES INICIALIZADAS POR CAMPOS DE TIPO POST
        $idUsuario = $_POST["txtIdUsuario"];
        $nombre = trim($_POST['txtNombreu']);
        $apellido = trim($_POST['txtApellidou']);
        $identificacion = trim($_POST['txtIdentificacionu']);
        $telefono = trim($_POST['txtTelefonou']);
        $direccion = trim($_POST['txtDireccionu']);
        $correo = trim($_POST['txtCorreou']);
        $password = $_POST['txtPasswordu'];
        $rol = $_POST["cmbRolu"];

        if ($nombre == "" || $apellido == "" || $identificacion == "" || $telefono == "" || $direccion == "" || $correo == "" || $password == "" || $rol == "0") {
            echo "3";
        } else {
            //EJECUTO PROCEDIMIENTO ALMACENADO
            $sql = "CALL stp_validarusuarios_registrocorreo('$correo')";
            $result = mysqli_query($con, $sql);
            $con->close();
            while ($row = mysqli_fetch_array($result)) {
                if ($row['USU_PASSWORD'] == $password) {
                    $pass = $password;
                } else {
                    $pass = md5($password);
                }
            }
            if (mysqli_num_rows($result) > 0) {
                $con = Conexion();
                $sqlRegistro = "UPDATE tbl_usuario SET rol_id='$rol',usu_nombre='$nombre',usu_apellido='$apellido', usu_password='$pass',usu_identificacion='$identificacion',
                usu_telefono='$telefono',usu_direccion='$direccion' WHERE usu_estado='A' AND usu_id='$idUsuario'";
                $resultRegistro = mysqli_query($con, $sqlRegistro);
                $con->close();
                if ($resultRegistro) {
                    echo "1";
                }
            } else {
                //INSTANCIO LA CONEXION BD  
                $con = Conexion();
                //EJECUTO PROCEDIMIENTO ALMACENADO
                $sqlRegistro = "UPDATE tbl_usuario SET rol_id='$rol',usu_nombre='$nombre',usu_apellido='$apellido', usu_correo='$correo',usu_password='$pass',usu_identificacion='$identificacion',
                usu_telefono='$telefono',usu_direccion='$direccion' WHERE  usu_estado='A' AND usu_id='$idUsuario'";
                $resultRegistro = mysqli_query($con, $sqlRegistro);
                $con->close();
                if ($resultRegistro) {
                    echo "2";
                }
            }
        }
    }

    function eliminarUsuario()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        $idUsuario = $_POST['idUsuario'];
        //EJECUTO PROCEDIMIENTO ALMACENADO
        $sql = "UPDATE tbl_usuario SET usu_estado = 'I' WHERE usu_id = '$idUsuario'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "1";
        }
    }

    function obtenerRol()
    {
        $con = Conexion();
        $sql = "SELECT * FROM  tbl_rol  WHERE rol_estado ='A'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return $result;
        }
    }
}
/*---------------------LLAMADA DESDE LOS BOTONES PARA QUE EJECUTEN CRUD--------------------------------*/
$usuario = new Usuario();
//CAPTURAR LOS DATOS ENVIADOS METODO POST AJAX
if (isset($_GET['register'])) {
    $usuario->registrarUsuario();
} else if (isset($_GET['add'])) {
    $usuario->guardarUsuario();
} else if (isset($_GET['edit'])) {
    $usuario->modificarUsuario();
} else if (isset($_GET['delete'])) {
    $usuario->eliminarUsuario();
}
