<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 18-11-18
 * Time: 下午6:27
 */

namespace wechat\util;


class EncyptUtils
{

    public function getSignature($card_id, $api_ticket)
    {
        $timestamp = time();
        $nonce_str = $this->create_nonce_str(16);
        $data = compact('card_id','api_ticket','nonce_str','timestamp');
        $data = sort($data);
        return sha1(join('',$data));
    }

    public function create_nonce_str($n,$type="str"){
        if($type=="str"){
            $str = "23456789abcdefghijkmnpqrstuvwxyz";
        }
        if($type=="num"){
            $str = "123456789";
        }
        $nonceStr = '';
        for ($i=0; $i<$n; $i++){
            $nonceStr.= $str[mt_rand(0, strlen($str)-1)];
        }
        return $nonceStr;
    }

}