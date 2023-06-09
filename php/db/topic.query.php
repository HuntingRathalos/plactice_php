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

        // クエリにはなるべく詳細な条件を付与せず使いまわしやすくする
        // 呼び出し側で条件指定する
        $sql = "
        select
            t.*, u.nickname
        from topics t
        inner join users u
            on t.id = u.id
        where t.del_flg != 1
            and u.del_flg != 1
        order by t.id desc
        ";
        $result = $db->selectOne($sql, [
            ':id' => $topic->id
        ], DataSource::CLS, TopicModel::class);

        return $result;
    }

    public static function incrementViewCount($topics)
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

    public static function isUserOwnTopic($topic_id, $user)
    {
        if (!($TopicModel::validatedId($topic_id) && $user->isValidId())) {
            return false;
        }

        $db = new DataSource();

        $sql = "
        select
            count(1) as count
        from topics
        where id = :topic_id
            and where user_id = :user_id
            and where del_flg != 1;
        ";

        $result =  $db->selectOne([
            ':id' => $topic_id,
            ':user_id' => $user->id
        ]);

        // if (!empty($result) && $result != 0) {
        //     return false;
        // } else {
        //     return true;
        // }

        return !empty($result) && $result != 0;
    }

    public static function update($topic)
    {
        // バリデーション

        $db = new DataSource();

        $sql = "
        update topics
        set
            title = :title,
            published = :published
        where id = :id;
        "
        ;

        return $db->execute([
            ':id' => $topic->id,
            ':title' => $topic->title,
            ':published' => $topic->published,
        ]);
    }

    public static function insert($topic, $user)
    {
        // バリデーション

        $db = new DataSource();
        $sql = "insert into topics(title, published, user_id) values(:id, :published, :user_id);";

        return $db->execute($sql, [
            ':title' => $topic->title,
            ':published' => $topic->published,
            ':user_id' => $user->id,
        ]);
    }
}
