<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午5:19
 */

namespace wechat\request;


class DataCubeGetCardBizuinInfoRequest implements RequestInterface
{
    use RequestTrait;

    public $access_token;

    private $begin_date;
    private $end_date;
    private $cond_source;

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


    public function getMethod()
    {
        return "POST";
    }

    public function getPath()
    {
        return "/datacube/getcardbizuininfo";
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
        return json_encode($this->objectPublicToArray($this));
    }
}