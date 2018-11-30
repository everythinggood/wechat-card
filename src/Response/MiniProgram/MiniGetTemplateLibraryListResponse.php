<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午11:43
 */

namespace wechat\MiniProgram\response;


use wechat\response\BaseResponse;
use wechat\response\ResponseInterface;
use wechat\response\ResponseTrait;
use wechat\util\MatchUtils;

class MiniGetTemplateLibraryListResponse implements ResponseInterface
{
    use BaseResponse;
    use ResponseTrait;

    public $list;
    public $total_count;

    /**
     * @param $json
     * @return object
     * @throws \ReflectionException
     */
    public function setData($json)
    {
        if(MatchUtils::is_json($json)){
            $data = json_decode($json,true);
            return $this->arrayToObject($data,$this);
        }
        return $json;
    }
}