<?php

namespace models;

class TopicModel extends AbstractModel
{
    public int $id;
    public string $title;
    public int $published;
    public int $views;
    public int $likes;
    public int $dislikes;
    public string $user_id;
    public string $nickname;
    public int $del_flg;

    protected static $SESSION_NAME = '_topic';

    // 仮実装
    public function isValidId()
    {
        return true;
    }

    public static function validatedId($val)
    {
        return true;
    }
}
