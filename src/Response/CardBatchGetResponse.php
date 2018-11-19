<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-16
 * Time: 上午12:20
 */

namespace wechat\response;


class CardBatchGetResponse implements ResponseInterface
{
    use BaseResponse;
    use ResponseTrait;

    public $card_id_list;
    public $total_num;


    /**
     * @param $response
     * @return object
     * @throws \ReflectionException
     */
    public function setData($response)
    {
        $responseArr = json_decode($response,true);
        return $this->arrayToObject($responseArr,$this);
    }
}