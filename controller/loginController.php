<?php
include("../model/conexion.php");
include("helperController.php");

use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;

require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/SMTP.php';

class Login
{
    function iniciarSesion()
    {
        session_start();
        $con = Conexion();
        $correo = $_POST["txtCorreo"];
        $password = md5($_POST["txtPassword"]);
        $sql = "CALL stp_obtenerusuario_login('$correo','$password')";
        $result = mysqli_query($con, $sql);
        $con->close();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $idUsuario = $row['usu_id'];
                $rol = $row['rol_id'];
                $nombreUsuario = $row['usu_nombre'] . ' ' . $row['usu_apellido'];
            }
            $_SESSION['idUsuario'] = $idUsuario;
            $_SESSION['rol'] = $rol;
            $_SESSION['nombreUsuario'] = $nombreUsuario;
            echo "1";
        } else {
            echo "2";
        }
    }

    function cerrarSesion()
    {
        //REANUDO LA SESION
        session_start();
        //CIERRO LA SESION
        session_destroy();
        header("location:../view/login.php");
    }

    /**
     * debugPDO
     *
     * Shows the emulated SQL query in a PDO statement. What it does is just extremely simple, but powerful:
     * It combines the raw query and the placeholders. For sure not really perfect (as PDO is more complex than just
     * combining raw query and arguments), but it does the job. 
     * @author Panique
     * @param string $raw_sql
     * @param array $parameters
     * @return string
     */
    function debugPDO($raw_sql, $parameters = null)
    {
        $keys = array();
        $values = $parameters;

        foreach ($parameters as $key => $value) {
            // check if named parameters (':param') or anonymous parameters ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }
            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }
        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
    }

    function obtenerOS()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform = "Unknown OS Platform";

        $os_array = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }

        return $os_platform;
    }

    function obtenerBrowser()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $browser = "Unknown Browser";

        $browser_array = array(
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
            '/netscape/i' => 'Netscape',
            '/maxthon/i' => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i' => 'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }
        return $browser;
    }

    function enviarCorreo($correo, $nombre, $codigo)
    {
        $dato = new Login(); {
            $template = file_get_contents('../view/templatecorreo.php');
            $template = str_replace("{{name}}", $nombre, $template);
            $template = str_replace("{{action_url_2}}", 'http://192.168.1.33:82/biblioteca/controller/loginController.php?codpass=' . $codigo, $template);
            $template = str_replace("{{action_url_1}}", 'http://192.168.1.33:82/biblioteca/controller/loginController.php?codpass=' . $codigo, $template);
            $template = str_replace("{{year}}", date('Y'), $template);
            $template = str_replace("{{operating_system}}", $dato->obtenerOS(), $template);
            $template = str_replace("{{browser_name}}", $dato->obtenerBrowser(), $template);

            $mail = new PHPMailer(true);
            $mail->CharSet = "UTF-8";
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'softwaresistemas3@gmail.com';   //username
                $mail->Password = 'infosistemas2020';   //password
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;                    //smtp port
                $mail->setFrom('softwaresistemas3@gmail.com', 'BookStore');
                $mail->addAddress($correo, $nombre);
                $mail->isHTML(true);
                $mail->Subject = 'Recuperación de contraseña - BookStore';
                $mail->Body    = $template;
                if (!$mail->send()) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $e) {
                return false;
            }
        }
    }

    function recuperarClave()
    {
        $con = Conexion();
        $datos = new Login();
        $correo = $_POST['txtCorreo'];
        $fechaRecuperacion = date("Y-m-d H:i:s", strtotime('+24 hours'));
        $codigoRecuperacion = codigoRandom();
        //VALIDAR SI EXISTE RECUPERACION DE CLAVE CON ESE CODIGO
        $sql = "CALL stp_enviarcorreo_usuario('$correo','$codigoRecuperacion','$fechaRecuperacion')";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "1";
        } else {
            //RECORRO LA CONSULTA RETORNADA Y LUEGO CAPTURO EL ID DEL ROL PARA COMPARAR
            while ($row = mysqli_fetch_array($result)) {
                $nombre = $row['usu_nombre'];
            }
            //LE ENVIO UN CORREO CON LOS DATOS
            $datos->enviarCorreo($correo, $nombre, $codigoRecuperacion);
            echo "2";
        }
    }

    function actualizarClave()
    {
        $codigoclave = $_GET['codpass'];
        if (isset($codigoclave)) {
            $con = Conexion();
            $sql = "CALL stp_obtenerusuario_codigorecuperacion('$codigoclave')";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) == 0) {
                echo "<script>alert('El código de recuperación de la contraseña no es válido. Por favor intente de nuevo.');location.href='../view/login.php';</script>";
            } else {
                $fechaactual = date("Y-m-d H:i:s");
                //RECORRO EL RETORNO DEL SQL QUE OBTIENE DE LA TABLA RECUPERACION
                while ($row = mysqli_fetch_array($result)) {
                    $fecharecuperacion = $row['rec_fecharecuperacion'];
                }
                //VALIDAMOS SI LA CLAVE ES VERDADERA EN BASE A LA FECHA
                if (strtotime($fechaactual) > strtotime($fecharecuperacion)) {
                    echo "<script>alert('El código de recuperación de la contraseña ha expirado. Por favor intente de nuevo.');location.href='../view/login.php';</script>";
                } else {
                    header("location: http://192.168.1.33:82/biblioteca/view/loginrecovery.php?cod=" . $codigoclave . "");
                }
            }
        } else {
            header("location:../view/404.php");
        }
    }

    function cambiarClave()
    {
        $con = Conexion();
        $password1 = $_POST['txtPassword'];
        $password2 = $_POST['txtRepeatPassword'];
        $codigorecuperacion = $_POST['txtCodigoRecuperacion'];
        $nuevocodigo = CodigoRandom();
        if (($password1 == $password2) && ($password1 != "" || $password2 != "")) {
            //ENCRIPTAR CLAVE NUEVA
            $password = md5($password1);
            //CONSULTAR USUARIO PARA ACTUALIZAR EL PASSWORD
            $sql = "CALL stp_actualizarclave_usuario('$codigorecuperacion','$password','$nuevocodigo')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "1";
            } else {
                echo "2";
            }
        }
    }
}

/*---------------------LLAMADA DESDE LOS BOTONES PARA QUE EJECUTEN CRUD--------------------------------*/
$login = new Login();
//CAPTURAR LOS DATOS ENVIADOS  METODO POST GUARDAR
if (isset($_GET['login'])) {
    $login->iniciarSesion();
} else if (isset($_GET['sesion'])) {
    $login->cerrarSesion();
} else if (isset($_GET['recovery'])) {
    $login->recuperarClave();
} else if (isset($_GET['codpass'])) {
    $login->actualizarClave();
} elseif (isset($_GET['loginrecovery'])) {
    $login->cambiarClave();
}
