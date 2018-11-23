<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午7:13
 */

namespace wechat\response;

/**
 * 查询code接口
 * Class CardCodeGetResponse
 * @package wechat\response
 */
class CardCodeGetResponse implements ResponseInterface
{

    use BaseResponse;
    use ResponseTrait;

    public $card;
    public $openid;
    public $can_consume;
    public $outer_str;
    public $user_card_status;

    const USER_CARD_NORMAL = 'normal';
    const USER_CARD_CONSUMED = 'consumed';
    const USER_CARD_EXPIRE = 'expire';
    const USER_CARD_GIFTING = 'gifting';
    const USER_CARD_TIMEOUT = 'timeout';
    const USER_CARD_DELETE = 'delete';
    const USER_CARD_UNAVAILABLE = 'unavailable';

    /**
     * @param $json
     * @return object|CardCodeGetResponse
     * @throws \ReflectionException
     */
    public function setData($json)
    {
        $arr = json_decode($json,true);
        return $this->arrayToObject($arr,$this);
    }
}