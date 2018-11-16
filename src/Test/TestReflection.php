<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-16
 * Time: 上午12:05
 */
require __DIR__.'/../../vendor/autoload.php';
//$request = new \wechat\request\CardBatchGetRequest();
//$request->setCount(10);
//$request->setOffset(0);
//$request->setStatusList([\wechat\request\CardBatchGetRequest::CARD_STATUS_DISPATCH,\wechat\request\CardBatchGetRequest::CARD_STATUS_VERIFY_OK]);
//var_dump($request->getBody());
//var_dump($request->getParams());

$now = time();

$client = new \wechat\Client();
$response = $client->http_get("https://api.oppein.cn/wechat/accesstoken/getaccesstoken/wx63b69c06d249955a");
$access_token = json_decode($response,true)['access_token'];

$client->setDomain('https://api.weixin.qq.com');
$request = new \wechat\request\CardBatchGetRequest();
$request->access_token = $access_token;
$request->setCount(10);
$request->setOffset(0);
$request->setStatusList([\wechat\request\CardBatchGetRequest::CARD_STATUS_DISPATCH,\wechat\request\CardBatchGetRequest::CARD_STATUS_VERIFY_OK]);
$response = new \wechat\response\CardBatchGetResponse();
/** @var \wechat\response\CardBatchGetResponse $response */
$response = $client->execute($request,$response);
$card_id_list = $response->card_id_list;

$card_info_list = [];
foreach ($card_id_list as $card_id){
    $request = new \wechat\request\CardGetRequest();
    $request->access_token = $access_token;
    $request->setCardId($card_id);
    $response = new \wechat\response\CardGetResponse();
    /** @var \wechat\response\CardGetResponse $response */
    $response = $client->execute($request,$response);
    $card_info_list[$card_id] = $response->card;
}

$end = time();

echo ($end-$now);

var_export($card_info_list);

