<?php

namespace lib;

use models\AbstractModel;
use Throwable;

class Msg extends AbstractModel
{
    protected static $SESSION_NAME = '_msg';
    public const ERROR = 'error';
    public const INFO = 'info';
    public const DEBUG = 'debug';

    public static function push($type, $msg)
    {
        if (!is_array(static::init())) {
            static::init();
        }
        $msgs = static::getSession();
        $msgs[$type][] = $msg;
        static::setSession($msgs);
    }

    public static function flash()
    {
        $msg_wigh_type = static::getSessionAndFlush() ?? [];
        foreach ($msg_wigh_type as $type =>  $msgs) {
            if ($type === static::DEBUG && !DEBUG) {
                continue;
            }

            $color = $type === static::INFO ? 'alert-info' : 'alert-danger';
            foreach ($msgs as $msg) {
                echo "<div class='alert $color'>{$msg}</div>";
            }
        }
    }

    public static function init()
    {
        static::setSession([
            static::ERROR => [],
            static::INFO => [],
            static::DEBUG => [],
        ]);
    }
}
