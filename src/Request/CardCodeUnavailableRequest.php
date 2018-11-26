<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午7:16
 */

namespace wechat\request;


class CardCodeUnavailableRequest implements RequestInterface
{

    use RequestTrait;

    public $access_token;

    private $card_id;
    private $code;
    /**
     * not must
     * @var
     */
    private $reason;

    /**
     * @param mixed $card_id
     */
    public function setCardId($card_id)
    {
        $this->card_id = $card_id;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    public function getMethod()
    {
        return "POST";
    }

    public function getPath()
    {
        return "/card/code/unavailable";
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