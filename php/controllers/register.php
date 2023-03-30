<?php

namespace controllers\register;

use lib\Auth;
use models\UserModel;
use lib\Msg;

function get()
{
    \view\register\index();
}


function post()
{
    $user = new UserModel();
    $user->id = get_param('id', '');
    ;
    $user->pwd = get_param('pwd', '');
    $user->nickname = get_param('nickname', '');

    if (Auth::regist($user)) {
        redirect(GO_HOME);
        Msg::push(Msg::INFO, "{$user->nickname}さん、ようこそ。");
    } else {
        // Auth::registでエラー処理されるので、ここで書く必要がない
        redirect(GO_REFERER);
    }
}
