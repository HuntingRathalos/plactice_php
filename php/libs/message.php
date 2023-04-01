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
        if (!is_array(static::getSession())) {
            static::init();
        }
        $msgs = static::getSession();
        $msgs[$type][] = $msg;
        static::setStssion($msgs);
    }

    public static function flush()
    {
        try {
            $msg_wigh_type = static::getSessionAndFlush() ?? [];

            echo '<div id="messages">';

            foreach ($msg_wigh_type as $type => $msgs) {
                if ($type === static::DEBUG && !DEBUG) {
                    continue;
                }

                $color = $type ===  static::INFO ? 'alert-info' : 'alert-danger';
                foreach ($msgs as $msg) {
                    echo "<div class='alert $color'>{$msg}</div>";
                }
            }

            echo '</div>';
        } catch (Throwable $e) {
            Msg::push(Msg::DEBUG, 'Msg::flushでエラー発生');
        }
    }
    public static function init()
    {
        static::setStssion([
            static::ERROR => [],
            static::INFO => [],
            static::DEBUG => [],
        ]);
    }
}
