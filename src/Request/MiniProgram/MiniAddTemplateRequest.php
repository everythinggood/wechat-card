<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午11:15
 */

namespace wechat\MiniProgram\Request;


use wechat\request\RequestInterface;
use wechat\request\RequestTrait;

class MiniAddTemplateRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    /**
     * @var string
     */
    private $id;
    /**
     * 关键词列表
     * @example [3,4,5]
     * @var array
     */
    private $keyword_id_list;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param array $keyword_id_list
     */
    public function setKeywordIdList(array $keyword_id_list): void
    {
        $this->keyword_id_list = $keyword_id_list;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/cgi-bin/wxopen/template/add';
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getParams()
    {
        return $this->objectPublicToArray($this);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getBody()
    {
        return json_encode($this->objectPrivateToArray($this));
    }
}