<?php

namespace controllers\topic\archive;

use models\UserModel;

function get()
{
    $user = UserModel::getSession();
}

function post()
{
}
