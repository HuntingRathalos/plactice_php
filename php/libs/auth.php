<?php

namespace lib;

use db\UserQuery;
use models\UserModel;
use Throwable;
use Traversable;

class Auth
{
    public static function login($id, $pwd)
    {
        try {
            // 今回はstaticメソッドで読んでいるが、$userを受けるように修正してもおけ
            if (!(UserModel::validatedId($id))
            * UserModel::validatedPwd($pwd)) {
                return false;
            }
            $is_success = false;

            $user = UserQuery::fetchById($id);

            if (!empty($user) && $user->$del_flg !== 1) {
                if (password_verify($pwd, $user->pwd)) {
                    $is_success = true;
                    UserModel::setStssion($user);
                // $_SESSION['user'] = $user;
                } else {
                    Msg::push(Msg::ERROR, 'パスワードが一致しません。');
                }
            } else {
                Msg::push(Msg::ERROR, 'ユーザーが見つかりません。');
            }
        } catch (Throwable $e) {
            $is_success = false;
            Msg::push(Msg::ERROR, 'ログインがうまくいきませんでした。');
        }

        return $is_success;
    }

    public static function regist($user)
    {
        try {
            // 下２つは実装してない
            if (!($user->isValidId()
            * $user->isValidPwd()
            * $user->isValidNickname())) {
                return false;
            }

            $is_success = false;

            $exist_user = UserQuery::fetchById($user->id);

            if (!empty($exist_user)) {
                Msg::push(Msg::ERROR, 'ユーザが既に存在します。');
                return;
            }

            $is_success =  UserQuery::insert($user);

            if ($is_success) {
                UserModel::setStssion($user);
                // $_SESSION['user'] = $user;
            }
        } catch(Throwable $e) {
            $is_success = false;
            Msg::push(Msg::ERROR, '登録がうまくいきませんでした。');
        }

        return $is_success;
    }

    public static function isLogin()
    {
        try {
            $user = UserModel::getSession();
        } catch (Throwable $e) {
            // ログアウト処理
            UserModel::clearSession();
            Msg::push(Msg::ERROR, '再度ログインしてください。');
            return false;
        }

        if (isset($user)) {
            return true;
        } else {
            return false;
        }
    }

    public static function logout()
    {
        try {
            UserModel::clearSession();
        } catch (Throwable $e) {
            Msg::push(Msg::ERROR, "エラー発生");
        }
        return true;
    }

    public static function requireLogin()
    {
        if (!static::isLogin()) {
            Msg::push(Msg::ERROR, 'ログインしてください。');
            redirect('login');
        }
    }
}
