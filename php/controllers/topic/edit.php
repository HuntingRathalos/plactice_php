<?php

namespace controllers\topic\edit;

use lib\Auth;
use models\TopicModel;
use models\UserModel;

function get()
{
    Auth::requireLogin();

    $topic = new TopicModel();
    $topic->id = get_param('topic_id', null, false);

    $user = UserModel::getSession();
    Auth::requirePermission($topic->id, $user);
}
