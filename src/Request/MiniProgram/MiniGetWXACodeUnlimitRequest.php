<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午10:38
 */

namespace wechat\MiniProgram\Request;


use wechat\request\RequestInterface;
use wechat\request\RequestTrait;

class MiniGetWXACodeUnlimitRequest implements RequestInterface
{

    use RequestTrait;

    public $access_token;

    /**
     * @example 不支持%
     * @var string
     */
    private $scene;
    /**
     * @example pages/index/index
     * @var string
     */
    private $page;
    /**
     * @var int
     */
    private $width;
    /**
     * @var boolean
     */
    private $auto_color;
    /**
     * @example {"r":0,"g":0,"b":0}
     * @var string
     */
    private $line_color;
    /**
     * @var boolean
     */
    private $is_hyaline;

    /**
     * @param string $scene
     */
    public function setScene(string $scene)
    {
        $this->scene = $scene;
    }

    /**
     * @param string $page
     */
    public function setPage(string $page)
    {
        $this->page = $page;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * @param bool $auto_color
     */
    public function setAutoColor(bool $auto_color)
    {
        $this->auto_color = $auto_color;
    }

    /**
     * @param string $line_color
     */
    public function setLineColor(string $line_color)
    {
        $this->line_color = $line_color;
    }

    /**
     * @param bool $is_hyaline
     */
    public function setIsHyaline(bool $is_hyaline)
    {
        $this->is_hyaline = $is_hyaline;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/wxa/getwxacodeunlimit';
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