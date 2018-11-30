<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-29
 * Time: 下午11:50
 */

namespace wechat\MiniProgram\Request;


use wechat\request\RequestInterface;
use wechat\request\RequestTrait;

class MiniSendTemplateMessageRequest implements RequestInterface
{

    use RequestTrait;

    public $access_token;

    private $touser;
    private $template_id;
    private $page;
    private $form_id;
    private $data;
    private $emphasis_keyword;

    /**
     * @param mixed $touser
     */
    public function setTouser($touser): void
    {
        $this->touser = $touser;
    }

    /**
     * @param mixed $template_id
     */
    public function setTemplateId($template_id): void
    {
        $this->template_id = $template_id;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page): void
    {
        $this->page = $page;
    }

    /**
     * @param mixed $form_id
     */
    public function setFormId($form_id): void
    {
        $this->form_id = $form_id;
    }

    /**
     * @param mixed $emphasis_keyword
     */
    public function setEmphasisKeyword($emphasis_keyword): void
    {
        $this->emphasis_keyword = $emphasis_keyword;
    }

    public function getMethod()
    {
        return 'POST';
    }

    public function getPath()
    {
        return '/cgi-bin/message/wxopen/template/send';
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