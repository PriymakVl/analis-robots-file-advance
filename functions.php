<?php

function mydebug($arr)
{
    if (is_array($arr)) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    else var_dump($arr);
    echo '<br>';
    exit('end script');
}
