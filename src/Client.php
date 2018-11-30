<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-15
 * Time: 下午11:23
 */

namespace wechat;


use wechat\request\RequestInterface;
use wechat\response\ResponseInterface;

class Client
{
    /**
     * @var string
     */
    public $domain;
    public $logger;

    /**
     * Client constructor.
     * @param string $domain
     * @param $logger
     */
    public function __construct($domain = null, $logger = null)
    {
        $this->domain = $domain;
        $this->logger = $logger;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @param mixed $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    public function execute(RequestInterface $request, ResponseInterface $response)
    {
        $method = strtoupper($request->getMethod());
        if($method == 'GET'){
            $url = join('?',array($this->domain.$request->getPath(),http_build_query($request->getParams())));
            $json = $this->http_get($url);
            $result = $response->setData($json);
            return $result;
        }
        if($method == 'POST'){
            $url = join('?',array($this->domain.$request->getPath(),http_build_query($request->getParams())));
            $json = $this->http_post($url,$request->getBody());
            $result = $response->setData($json);
            return $result;
        }

        return null;
    }

    public function http_get($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        //以下两行，忽略 https 证书
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($curl);
        curl_close($curl);
        return $content;
    }

    public function http_post($url,$data,$option=array('Content-Type: application/json'))
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        //以下两行，忽略 https 证书
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        //
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $option);
        $content = curl_exec($curl);
        curl_close($curl);
        return $content;
    }

}