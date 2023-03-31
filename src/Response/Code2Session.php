<?php


namespace Ajian\Miniprogram\Response;


class Code2Session extends BaseResponse
{
    private $session_key;
    private $unionid;
    private $openid;

    public function getSessionKey(){
        return $this->session_key;
    }

    public function getUnionid(){
        return $this->unionid;
    }

    public function getOpenid(){
        return $this->openid;
    }

    public function init($content)
    {
        if(isset($content['session_key'])){
            $this->session_key = $content['session_key'];
        }
        if(isset($content['unionid'])){
            $this->unionid = $content['unionid'];
        }
        if(isset($content['openid'])){
            $this->openid = $content['openid'];
        }
    }
}