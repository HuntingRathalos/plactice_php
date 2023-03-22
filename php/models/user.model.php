<?php
namespace models;

use lib\Msg;

class UserModel extends AbstractModel{
    public string $id;
    public string $pwd;
    public string $nickname;
    public int $del_flg;

    protected static $SESSION_NAME = '_user';

    public function isValidId() {
        return static::validatedId($this->id);
    }

    public static function validatedId($val) {
        $res = true;

        if(empty($val)) {
            Msg::push(Msg::ERROR, 'ユーザーIdを入力してください。');
        $res = false;

        } else {
            if(strlen($val) > 10) {
            Msg::push(Msg::ERROR, 'ユーザーIdは１０桁以下で入力してください。');
            $res = false;
            }
            if(!is_alnum()) {
            Msg::push(Msg::ERROR, 'ユーザーIdは半角英数字で入力してください。');
            $res = false;
            }
        }
        return $res;
    }
}
