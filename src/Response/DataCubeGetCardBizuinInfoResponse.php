<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午5:23
 */

namespace wechat\response;


class DataCubeGetCardBizuinInfoResponse implements ResponseInterface
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
        $data = json_decode($json,true);
        return $this->arrayToObject($data);
    }
}