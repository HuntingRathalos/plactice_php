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
}

function post()
{
}
