<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午11:48
 */

require __DIR__.'/../../vendor/autoload.php';
$client = new \wechat\Client();
$response = $client->http_get("https://api.oppein.cn/wechat/accesstoken/getaccesstoken/wx63b69c06d249955a");
$access_token = json_decode($response,true)['access_token'];
var_dump($access_token);

$client->setDomain('https://api.weixin.qq.com');

$request = new \wechat\request\CardUserGetCardListRequest();
$request->access_token = $access_token;
$request->setOpenid("osPr10Ai5cgE7AYPs5zmg4mKdjm4");
$response = new \wechat\response\CardUserGetCardListResponse();
/** @var \wechat\response\CardUserGetCardListResponse $response */
$response = $client->execute($request,$response);
var_export($response);