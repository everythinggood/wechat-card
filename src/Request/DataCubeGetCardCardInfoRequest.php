<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午5:28
 */

namespace wechat\request;


class DataCubeGetCardCardInfoRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $begin_date;
    private $end_date;
    private $cond_source;
    /**
     * not must
     * @var
     */
    private $card_id;

    const PLATFORM_CODE = 0;
    const API_CODE = 1;

    /**
     * @param mixed $begin_date
     */
    public function setBeginDate($begin_date): void
    {
        $this->begin_date = $begin_date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate($end_date): void
    {
        $this->end_date = $end_date;
    }

    /**
     * @param mixed $cond_source
     */
    public function setCondSource($cond_source): void
    {
        $this->cond_source = $cond_source;
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
        return "/datacube/getcardcardinfo";
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