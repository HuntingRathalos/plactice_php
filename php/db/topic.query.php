<?php

namespace db;

use db\DataSource;
use models\TopicModel;

class TopicQuery
{
    public static function fetchByUserId($user)
    {
        if (!$user->isValidid()) {
            return false;
        }

        $db = new DataSource();
        $sql = "select * from topics where user_id = :id;";
        $result = $db->select($sql, [
            ':id' => $user->id
        ], DataSource::CLS, TopicModel::class);

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
