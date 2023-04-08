<?php

namespace db;

use db\DataSource;
use models\CommentModel;

class CommentQuery
{
    public static function fetchByTopicId($topic)
    {
        if (!$topic->isValidId()) {
            return false;
        }

        $db = new DataSource();
        $sql = "
        select
            c.*, u.nickname
        from comments c
        inner join users u
            on c.user_id = u.id
        where c.del_flg != 1
            and c.body != ''
            and u.del_flg != 1
            and c.topic_id = :id
        order by c.id desc;
        ";
        $result = $db->select($sql, [
            ':id' => $topic->id
        ], DataSource::CLS, CommentModel::class);

        return $result;
    }

    // public static function insert($topic)
    // {
    //     $db = new DataSource();
    //     $sql = "insert into topics(id, pwd, nickname) values(:id, :pwd, :nickname);";
    //     $topic->pwd = password_hash($topic->pwd, PASSWORD_BCRYPT);

    //     return $db->execute($sql, [
    //         ':id' => $topic->id,
    //         ':pwd' => $topic->pwd,
    //         ':nickname' => $topic->nickname,
    //     ]);
    // }
}
