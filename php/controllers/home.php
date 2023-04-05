<?php

namespace controllers\home;

function get()
{
    // require_once SOURCE_BASE . 'views/home.php';
    \view\home\index($topics);
}

function post()
{
    echo 'postです';
}
