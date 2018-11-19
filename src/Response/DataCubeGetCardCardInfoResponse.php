<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午5:30
 */

namespace wechat\response;


use wechat\response\entity\DataCubeCardInfo;

class DataCubeGetCardCardInfoResponse implements ResponseInterface
{
    use BaseResponse;
    use ResponseTrait;

    public $list = [];
    /**
     * @param $json
     * @return object
     * @throws \ReflectionException
     */
    public function setData($json)
    {
        $data = json_decode($json,true);
        /** @var DataCubeGetCardCardInfoResponse $response */
        $response = $this->arrayToObject($data,$this);
        foreach ($response->list as $key=>$cardInfo){
            $response->list[$key] = $this->arrayToObject($cardInfo,DataCubeCardInfo::class);
        }
        return $response;
    }
}