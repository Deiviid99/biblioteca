<?php

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
