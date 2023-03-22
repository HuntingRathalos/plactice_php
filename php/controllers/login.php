<?php
namespace controllers\login;

use lib\Auth;
use lib\Msg;
use models\UserModel;

function get() {
    require_once SOURCE_BASE . 'views/login.php';
}


function post() {
    $id = get_param('id', '');
    $pwd = get_param('pwd', '')

    if(Auth::login($id, $pwd)) {
        $user = UserModel::getSession();
        Msg::push(Msg::INFO, "{$user->nickname}さん、ようこそ。");
        redirect(GO_HOME);
    } else {
        // Auth::loginでエラー処理されるので、ここで書く必要がない
        redirect(GO_REFERER);
    }
}
