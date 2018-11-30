<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午11:33
 */

namespace wechat\MiniProgram\response;


use wechat\response\BaseResponse;
use wechat\response\entity\Keyword;
use wechat\response\ResponseInterface;
use wechat\response\ResponseTrait;
use wechat\util\MatchUtils;

class MiniGetTemplateLibraryByIdResponse implements ResponseInterface
{

    use BaseResponse;
    use ResponseTrait;

    public $id;
    public $keyword_list = [];
    public $title;

    /**
     * @param $json
     * @return MiniGetTemplateLibraryByIdResponse
     * @throws \ReflectionException
     */
    public function setData($json)
    {
        if(MatchUtils::is_json($json)){
            $arr = json_decode($json,true);
            /** @var MiniGetTemplateLibraryByIdResponse $response */
            $response = $this->arrayToObject($arr,$this);
            foreach ($arr['keyword_list'] as $item){
                $keyword = $this->arrayToObject($item,Keyword::class);
                $response->addKeyword($keyword);
            }
            return $response;
        }
        return $json;

    }

    protected function addKeyword($keyword){
        $this->keyword_list[] = $keyword;
    }
}