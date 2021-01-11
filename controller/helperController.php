<?php
define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$sistemas@2020dgd');
define('SECRET_IV', '0820253025');


function codigoRandom()
{
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz";
    srand((float)microtime() * 1000000);
    $i = 0;
    $pass = '';

    while ($i <= 30) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return time() . $pass;
}

function encriptar($dato)
{
    $output = FALSE;
    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    $output = openssl_encrypt($dato, METHOD, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
}

function desencriptar($dato)
{
    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    $output = openssl_decrypt(base64_decode($dato), METHOD, $key, 0, $iv);
    return $output;
}
