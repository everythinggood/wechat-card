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
     * @return object
     * @throws \ReflectionException
     */
    protected function arrayToObject($arr)
    {
        $reflect = new \ReflectionClass($this);
        $hResponse = $reflect->newInstance();
        foreach ($arr as $key => $value) {
            if ($reflect->hasProperty($key)) {
                $hResponse->{$key} = $value;
            }
        }
        return $hResponse;
    }

}