<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-16
 * Time: 上午1:06
 */

namespace wechat\response;


trait ResponseTrait
{
    /**
     * @param $arr
     * @param $obj
     * @return object
     * @throws \ReflectionException
     */
    protected function arrayToObject($arr,$obj)
    {
        $reflect = new \ReflectionClass($obj);
        $hResponse = $reflect->newInstance();
        foreach ($arr as $key => $value) {
            if ($reflect->hasProperty($key)) {
                $hResponse->{$key} = $value;
            }
        }
        return $hResponse;
    }

}