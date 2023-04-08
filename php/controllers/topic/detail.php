<?php

namespace controllers\topic\archive;

use db\TopicQuery;
use models\UserModel;
use lib\Auth;

function get()
{
    Auth::requireLogin();

    $user = UserModel::getSession();
    $topics = TopicQuery::fetchByUserId($user);

    if ($topics === false) {
        Msg::push(Msg::ERROR, 'ログインしてください。');
        redirect('login');
    }

    if (count($topics) > 0) {
        \view\topic\archive\index($topics);
    } else {
        echo '<div class="alert alert-primary">トピックを投稿しよう。</div>';
    }
}

function post()
{
}
