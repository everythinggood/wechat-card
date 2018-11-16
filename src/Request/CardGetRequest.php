<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-16
 * Time: 上午1:02
 */

namespace wechat\request;


class CardGetRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $card_id;

    /**
     * @param mixed $card_id
     */
    public function setCardId($card_id): void
    {
        $this->card_id = $card_id;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/card/get';
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