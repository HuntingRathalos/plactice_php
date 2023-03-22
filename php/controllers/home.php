<?php
namespace controllers\home;

function get() {
    require_once SOURCE_BASE . 'views/home.php';
}

function post() {
    echo 'postです';
}
