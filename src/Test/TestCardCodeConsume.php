<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-22
 * Time: 下午6:45
 */
require __DIR__.'/../../vendor/autoload.php';
$client = new \wechat\Client();
$response = $client->http_get("https://api.oppein.cn/wechat/accesstoken/getaccesstoken/wx63b69c06d249955a");
$access_token = json_decode($response,true)['access_token'];
var_dump($access_token);

$code = '595529763520';
$client->setDomain('https://api.weixin.qq.com');
$request = new \wechat\request\CardCodeGetRequest();
$request->access_token = $access_token;
$request->setCheckConsume(true);
$request->setCode($code);
$response = new \wechat\response\CardCodeGetResponse();
/** @var \wechat\response\CardCodeGetResponse $response */
$response = $client->execute($request,$response);

var_dump($response);
if($response->user_card_status == strtoupper(\wechat\response\CardCodeGetResponse::USER_CARD_NORMAL)){
    $request = new \wechat\request\CardCodeConsumeRequest();
    $request->access_token = $access_token;
    $request->setCode($code);
    $response = new \wechat\response\CardCodeGetResponse();
    /** @var \wechat\response\CardCodeConsumeResponse $response */
    $response = $client->execute($request,$response);
    var_dump($response);
}