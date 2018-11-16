<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-15
 * Time: 下午11:50
 */

namespace wechat\request;


trait RequestTrait
{

    /**
     * @param $obj
     * @return array
     * @throws \ReflectionException
     */
    protected function objectPrivateToArray( $obj)
    {
        $reflect = new \ReflectionClass($obj);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);
        $result = [];
        foreach ($props as $prop){
            $prop->setAccessible(true);
            $key = $prop->getName();
            $value = $prop->getValue($obj);
            if(is_object($value)){
                $value = $this->objectPrivateToArray($value);
            }
            $result[$key] = $value;
        }
        return $result;
    }
    /**
     * @param $obj
     * @return array
     * @throws \ReflectionException
     */
    protected function objectPublicToArray( $obj)
    {
        $reflect = new \ReflectionClass($obj);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        $result = [];
        foreach ($props as $prop){
            $prop->setAccessible(true);
            $key = $prop->getName();
            $value = $prop->getValue($obj);
            if(is_object($value)){
                $value = $this->objectPublicToArray($value);
            }
            $result[$key] = $value;
        }
        return $result;
    }

}