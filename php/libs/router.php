<?php

namespace lib;

use Throwable;

function route($rpath, $method) {

    try {

        if ($rpath === '') {
            $rpath = 'home';
        }

        $targetFile = SOURCE_BASE . "controllers/{$rpath}.php";

        if(!file_exists($targetFile)) {
            require_once SOURCE_BASE . 'views/404.php';
            return;

        require_once $targetFile;

        // ""内なので\はエスケープする！
        $fn = "\\controllers\\{$rpath}\\{$method}";
        $fn();

    } catch(Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        Msg::push(Msg::ERROR, '何かがおかしいようです。');
        redirect('404');
    }
}
