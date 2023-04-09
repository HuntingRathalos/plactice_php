<?php

namespace controllers\topic\detail;

use db\TopicQuery;
use models\UserModel;
use lib\Auth;
use models\TopicModel;

function get()
{
    $topic = new TopicModel();
    $topic->id = get_param('topic_id', null, false);
    $topic = TopicQuery::fetchByUserId($topic);

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
