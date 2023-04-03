<?php

namespace controllers\topic\archive;

use db\TopicQuery;
use models\UserModel;

function get()
{
    $user = UserModel::getSession();
    $topics = TopicQuery::fetchByUserId($user);
}

function post()
{
}
