<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-22
 * Time: 下午6:39
 */

namespace wechat\request;


class CardCodeConsumeRequest implements RequestInterface
{

    use RequestTrait;

    public $access_token;

    private $code;
    /**
     * custom must set this var
     * @var
     */
    private $card_id;

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
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
        return 'POST';
    }

    public function getPath()
    {
        return '/card/code/consume';
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
     * @return mixed
     * @throws \ReflectionException
     */
    public function getBody()
    {
        return json_encode($this->objectPrivateToArray($this));
    }
}