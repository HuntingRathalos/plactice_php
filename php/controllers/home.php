<?php

namespace controllers\home;

use db\TopicQuery;

function get()
{
    // require_once SOURCE_BASE . 'views/home.php';
    $topics = TopicQuery::fetchPublishedTopics();
    \view\home\index($topics);
}

function post()
{
    echo 'postです';
}
