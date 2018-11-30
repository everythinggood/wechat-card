<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午11:03
 */

namespace wechat\MiniProgram\Request;


use wechat\request\RequestInterface;
use wechat\request\RequestTrait;

class MiniImgSecCheckRequest implements RequestInterface
{

    use RequestTrait;

    public $access_token;

    private $media;

    /**
     * @param mixed $media
     */
    public function setMedia($media): void
    {
        $this->media = $media;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/wxa/img_sec_check';
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