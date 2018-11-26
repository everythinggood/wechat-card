<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午11:58
 */

namespace wechat\request;


class CardCodeDecryptRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $encrypt_code;

    /**
     * @param mixed $encrypt_code
     */
    public function setEncryptCode($encrypt_code)
    {
        $this->encrypt_code = $encrypt_code;
    }

    public function getMethod()
    {
        return "POST";
    }

    public function getPath()
    {
        return "/card/code/decrypt";
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