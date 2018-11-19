<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午7:09
 */

namespace wechat\response;


class CardUserGetCardListResponse implements ResponseInterface
{

    use BaseResponse;
    use ResponseTrait;

    public $card_list;
    public $has_share_card;

    /**
     * @param $json
     * @return object
     * @throws \ReflectionException
     */
    public function setData($json)
    {
        $arr  = json_decode($json,true);
        return $this->arrayToObject($arr,$this);
    }
}