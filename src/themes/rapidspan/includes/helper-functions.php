<?php
function strip_tel($number)
{
    return preg_replace('/[^0-9]/', '', $number);
}

function dump($item){
    echo '<pre>';
    print_r($item);
    echo '</pre>';
}
