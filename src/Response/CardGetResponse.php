<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-16
 * Time: 上午1:04
 */

namespace wechat\response;


class CardGetResponse implements ResponseInterface
{
    use BaseResponse;
    use ResponseTrait;

    public $card;


    /**
     * @param $json
     * @return object
     * @throws \ReflectionException
     */
    public function setData($json)
    {
        $responseArr = json_decode($json,true);
        return $this->arrayToObject($responseArr);
    }
}