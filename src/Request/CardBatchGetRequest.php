<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-15
 * Time: 下午11:34
 */

namespace wechat\request;


class CardBatchGetRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $offset;
    private $count;
    /**
     * @var array
     */
    private $status_list;

    const CARD_STATUS_VERIFY_OK = 'CARD_STATUS_VERIFY_OK';
    const CARD_STATUS_DISPATCH = 'CARD_STATUS_DISPATCH';

    /**
     * @param mixed $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @param array $status_list
     */
    public function setStatusList($status_list)
    {
        $this->status_list = $status_list;
    }


    public function getMethod()
    {
        return "POST";
    }

    public function getPath()
    {
        return "/card/batchget";
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