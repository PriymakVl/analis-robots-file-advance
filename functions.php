<?php

function get_response($param, $message, $key, $replace = NULL) 
{
    if ($replace) $message[$key] = str_replace('%', $replace, $message[$key]);

    if ($param) {
        $response['status'] = $message['status']['right'];
        $response['status_style'] = 'background: #339866';
        $response['description'] = $message[$key]['exist_descr'];
        $response['recommendation'] = $message['total']['exist_recom'];
    }
    else {
        $response['status'] = $message['status']['wrong'];
        $response['status_style'] = 'background: #FF8080';
        $response['description'] = $message[$key]['no_exist_descr'];
        $response['recommendation'] = $message[$key]['no_exist_recom'];
    }
    return $response;
}

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
