<?php

namespace controllers\topic\edit;

use db\TopicQuery;
use lib\Auth;
use models\TopicModel;
use models\UserModel;
use Throwable;

function get()
{
    Auth::requireLogin();

    $topic = new TopicModel();
    $topic->id = get_param('topic_id', null, false);

    $user = UserModel::getSession();
    Auth::requirePermission($topic->id, $user);

    $fetchedTopic = TopicQuery::fetchById($topic);

    \view\topic\edit\index($fetchedTopic);
}
