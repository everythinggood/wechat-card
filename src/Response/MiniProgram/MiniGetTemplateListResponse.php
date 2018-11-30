<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午11:49
 */

namespace wechat\MiniProgram\response;


use wechat\response\BaseResponse;
use wechat\response\ResponseInterface;
use wechat\response\ResponseTrait;

class MiniGetTemplateListResponse implements ResponseInterface
{
    use BaseResponse;
    use ResponseTrait;

    public $list;


    /**
     * @param $json
     * @return object
     * @throws \ReflectionException
     */
    public function setData($json)
    {
        $arr = json_decode($json,true);
        return $this->arrayToObject($arr,$this);
    }
}