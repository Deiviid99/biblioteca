<?php
include("../model/conexion.php");
include("helperController.php");

class Usuario
{

    function registrarUsuario()
    {
        //INSTANCIO LA CONEXION BD
        $con = Conexion();
        //DECLARACION DE VARIABLES INICIALIZADAS POR CAMPOS DE TIPO POST
        $nombre = $_POST['txtNombre'];
        $apellido = $_POST['txtApellido'];
        $identificacion = $_POST['txtIdentificacion'];
        $telefono = $_POST['txtTelefono'];
        $direccion = $_POST['txtDireccion'];
        $correo = $_POST['txtCorreo'];
        $password = md5($_POST['txtPassword']);
        //ASIGANMOS EL CODIGO PARA LA RECUPERACION DE LA CLAVE
        $codigorecuperacion = codigoRandom();
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
/*---------------------LLAMADA DESDE LOS BOTONES PARA QUE EJECUTEN CRUD--------------------------------*/
$usuario = new Usuario();
//CAPTURAR LOS DATOS ENVIADOS METODO POST AJAX
if (isset($_GET['register'])) {
    $usuario->registrarUsuario();
}
