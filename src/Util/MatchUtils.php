<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午10:17
 */

namespace wechat\util;


class MatchUtils
{

    public static function is_json($json){
        json_decode($json);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}