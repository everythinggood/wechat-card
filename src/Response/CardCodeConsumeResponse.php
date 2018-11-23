<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-22
 * Time: 下午6:42
 */

namespace wechat\response;


class CardCodeConsumeResponse implements ResponseInterface
{

    use BaseResponse;
    use ResponseTrait;

    public $openid;
    public $card;

    /**
     * @param $json
     * @return CardCodeConsumeResponse|object
     * @throws \ReflectionException
     */
    public function setData($json)
    {
        $arr = json_decode($json,true);
        return $this->arrayToObject($arr,$this);
    }
}