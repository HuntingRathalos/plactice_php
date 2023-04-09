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
        $sql = "select * from topics where user_id = :id; and del_flg != 1 order by desc;";
        $result = $db->select($sql, [
            ':id' => $user->id
        ], DataSource::CLS, TopicModel::class);

        return $result;
    }

    public static function fetchPublishedTopics()
    {
        $db = new DataSource();
        $sql = "
        select
            t.*, u.nickname
        from topics t
        inner join users u
            on t.user_id = u.id
        where t.del_flg != 1
            and u.del_flg != 1
            and t.published != 1
        order by t.id desc
        ";
        $result = $db->select($sql, [
            ':id' => $user->id
        ], DataSource::CLS, TopicModel::class);

        return $result;
    }

    public static function fetchById($topic)
    {
        if (!$topic->isValidId()) {
            return false;
        }

        $db = new DataSource();
        $sql = "
        select
            t.*, u.nickname
        from topics t
        inner join users u
            on t.id = u.id
        where t.del_flg != 1
            and u.del_flg != 1
            and t.published != 1
        order by t.id desc
        ";
        $result = $db->selectOne($sql, [
            ':id' => $topic->id
        ], DataSource::CLS, TopicModel::class);

        return $result;
    }

    public static function incrementViewCount()
    {
        if (!$topic->isValidId()) {
            return false;
        }

        $db = new DataSource();

        $sql = "update topics set view = view + 1 where id = :id;";

        return $db->execute([
            ':id' => $topic->id
        ]);
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
