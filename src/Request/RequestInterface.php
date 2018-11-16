<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-15
 * Time: 下午11:28
 */

namespace wechat\request;


interface RequestInterface
{
    public function getMethod();
    public function getPath();
    public function getParams();
    public function getBody();
}