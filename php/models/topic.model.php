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

    // public static function validatedId($val) {
    //     $res = true;

    //     if(empty($val)) {
    //         Msg::push(Msg::ERROR, 'ユーザーIdを入力してください。');
    //     $res = false;

    //     } else {
    //         if(strlen($val) > 10) {
    //         Msg::push(Msg::ERROR, 'ユーザーIdは１０桁以下で入力してください。');
    //         $res = false;
    //         }
    //         if(!is_alnum()) {
    //         Msg::push(Msg::ERROR, 'ユーザーIdは半角英数字で入力してください。');
    //         $res = false;
    //         }
    //     }
    //     return $res;
    // }
}
