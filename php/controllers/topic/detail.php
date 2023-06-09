<?php

namespace controllers\topic\detail;

use db\CommentQuery;
use db\TopicQuery;
use models\UserModel;
use lib\Auth;
use models\TopicModel;

function get()
{
    $topic = new TopicModel();
    $topic->id = get_param('topic_id', null, false);

    TopicQuery::incrementViewCount($topic);

    $fetchedTopic = TopicQuery::fetchById($topic);
    $comments = CommentQuery::fetchByTopicId($topic);

    if (empty($fetchedTopic) || !$fetchedTopic->published) {
        Msg::push(Msg::ERROR, 'トピックが見つかりません。');
        redirect('404');
    }

    \view\topic\detail\index($fetchedTopic, $comments);
}
