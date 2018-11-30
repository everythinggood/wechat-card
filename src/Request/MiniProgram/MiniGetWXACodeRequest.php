<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午10:32
 */

namespace wechat\MiniProgram\Request;


use wechat\request\RequestInterface;
use wechat\request\RequestTrait;

class MiniGetWXACodeRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $path;
    private $width;
    private $auto_color;
    private $line_color;
    private $is_hyaline;

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

    /**
     * @param mixed $auto_color
     */
    public function setAutoColor($auto_color): void
    {
        $this->auto_color = $auto_color;
    }

    /**
     * @param mixed $line_color
     */
    public function setLineColor($line_color): void
    {
        $this->line_color = $line_color;
    }

    /**
     * @param mixed $is_hyaline
     */
    public function setIsHyaline($is_hyaline): void
    {
        $this->is_hyaline = $is_hyaline;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/wxa/getwxacode';
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
        return json_encode($this->objectPublicToArray($this));
    }
}