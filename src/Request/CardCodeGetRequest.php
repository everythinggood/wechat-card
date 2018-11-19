<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午7:11
 */

namespace wechat\request;


class CardCodeGetRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $card_id;
    /**
     * not must
     * @var
     */
    private $code;
    /**
     * not must
     * @var
     */
    private $check_consume;

    /**
     * @param mixed $card_id
     */
    public function setCardId($card_id): void
    {
        $this->card_id = $card_id;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @param mixed $check_consume
     */
    public function setCheckConsume($check_consume): void
    {
        $this->check_consume = $check_consume;
    }

    public function getMethod()
    {
        return "POST";
    }

    public function getPath()
    {
        return "/card/code/get";
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