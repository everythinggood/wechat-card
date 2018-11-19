<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午7:13
 */

namespace wechat\response;


class CardCodeGetResponse implements ResponseInterface
{

    use BaseResponse;
    use ResponseTrait;

    public $card;
    public $openid;
    public $can_consume;
    public $outer_str;
    public $user_card_status;

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