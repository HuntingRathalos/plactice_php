<?php
namespace models;

use Error;

abstract class AbstractModel {
    protected static $SESSION_NAME = null;

    public static function setStssion($val) {
        if(empty(static::$SESSION_NAME)) {
            throw new Error('$SESSION_NAMEを設定してね');
        }

        $_SESSION[static::$SESSION_NAME] = $val;
    }

    public static function getSession() {
        return $_SESSION[static::$SESSION_NAME] ?? null;
    }

    public static function clearSession() {
        static::setStssion(null);
    }

    public static function getSessionAndFlush() {
        try {
            return static::getSession();
        } finally {
            static::clearSession();
        }
    }
}
