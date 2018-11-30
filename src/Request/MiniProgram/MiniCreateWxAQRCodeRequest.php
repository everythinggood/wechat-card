<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午10:02
 */

namespace wechat\MiniProgram\Request;


use wechat\request\RequestInterface;
use wechat\request\RequestTrait;

/**
 * 生成二维码
 * Class MiniCreateWxAQRCodeRequest
 * @package wechat\MiniProgram\Request
 */
class MiniCreateWxAQRCodeRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $path;
    /**
     * not must
     * @var
     */
    private $width;

    /**
     * @param mixed $path
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/cgi-bin/wxaapp/createwxaqrcode';
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
     * @return false|string
     * @throws \ReflectionException
     */
    public function getBody()
    {
        return json_encode($this->objectPrivateToArray($this));
    }
}