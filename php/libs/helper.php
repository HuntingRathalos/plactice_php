<?php

function get_param($key, $dafault_val, $is_post = true)
{
    $arry = $is_post ? $_POST : $_GET;
    return $arry[$key] ?? $dafault_val;
}

function redirect($path)
{
    if ($path === GO_HOME) {
        $path = get_url('');
    } elseif ($path === GO_REFERER) {
        $path = $_SERVER['HTTP_REFERER'];
    } else {
        $path = get_url($path);
    }

    header("Location: {$path}");
    die();
}

function the_url($path)
{
    echo get_url($path);
}

function get_url($path)
{
    return BASE_CONTEXT_PATH . trim($path, '/');
}

function is_alnum($val)
{
    return preg_match("/^[a-zA-Z0-9]+$/", $val);
}
