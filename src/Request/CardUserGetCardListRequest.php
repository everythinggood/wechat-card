<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午7:07
 */

namespace wechat\request;


class CardUserGetCardListRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $openid;
    /**
     * not must
     * @var
     */
    private $card_id;

    /**
     * @param mixed $openid
     */
    public function setOpenid($openid): void
    {
        $this->openid = $openid;
    }

    /**
     * @param mixed $card_id
     */
    public function setCardId($card_id): void
    {
        $this->card_id = $card_id;
    }

    public function getMethod()
    {
        return "POST";
    }

    public function getPath()
    {
        return "/card/user/getcardlist";
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