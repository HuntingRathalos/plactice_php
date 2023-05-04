<?php

namespace controllers\topic\create;

use db\TopicQuery;
use lib\Auth;
use lib\Msg;
use models\TopicModel;
use models\UserModel;
use Throwable;

function get()
{
    Auth::requireLogin();

    // \view\topic\edit\indexを使い回すため、ダミーデータ挿入
    $topic = new TopicModel();
    $topic->id = -1;
    $topic->title = '';
    $topic->published = 1;

    \view\topic\edit\index($fetchedTopic, false);
}

function post()
{
    Auth::requireLogin();

    $topic = new TopicModel();
    $topic->id = get_param('topic_id', null);
    $topic->title = get_param('title', null);
    $topic->published = get_param('published', null);

    $user = UserModel::getSession();
    Auth::requirePermission($topic->id, $user);

    try {
        $is_success = TopicQuery::update($topic);
    } catch(Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        $is_success = false;
    }

    if ($is_success) {
        Msg::push(Msg::INFO, 'トピックの更新に成功しました。');
        redirect('topic/archive');
    } else {
        Msg::push(Msg::ERROR, 'トピックの更新に失敗しました。');
        redirect('GO_REFFERER');
    }
}
