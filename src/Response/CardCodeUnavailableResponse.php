<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午7:19
 */

namespace wechat\response;


class CardCodeUnavailableResponse implements ResponseInterface
{
    use BaseResponse;
    use ResponseTrait;

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