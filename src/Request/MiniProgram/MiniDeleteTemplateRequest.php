<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午11:20
 */

namespace wechat\MiniProgram\Request;


use wechat\request\RequestInterface;
use wechat\request\RequestTrait;

class MiniDeleteTemplateRequest implements RequestInterface
{

    use RequestTrait;

    public $access_token;

    private $template_id;

    /**
     * @param mixed $template_id
     */
    public function setTemplateId($template_id): void
    {
        $this->template_id = $template_id;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/cgi-bin/wxopen/template/del';
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