<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午11:56
 */

namespace wechat\MiniProgram\Request;


use wechat\request\RequestInterface;
use wechat\request\RequestTrait;

class MiniSendUniformMessageRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $touser;
    private $weapp_template_msg;
    private $mp_template_msg;

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/cgi-bin/message/wxopen/template/uniform_send';
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
        return $this->objectPrivateToArray($this);
    }
}