<?php
namespace Ajian\Miniprogram\Response;


class AccessToken extends BaseResponse
{
    private $access_token;
    private $expires_in;

    public function init($content)
    {
        if (isset($content['access_token'])){
            $this->access_token = $content['access_token'];
        }
        if (isset($content['expires_in'])){
            $this->expires_in = $content['expires_in'];
        }
    }

    public function getAccessToken(){
        return $this->access_token;
    }

    public function getExpiresIn(){
        return $this->expires_in;
    }
}