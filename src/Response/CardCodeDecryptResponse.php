<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-19
 * Time: 上午12:02
 */

namespace wechat\response;


class CardCodeDecryptResponse implements ResponseInterface
{
    use BaseResponse;
    use ResponseTrait;

    public $code;

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