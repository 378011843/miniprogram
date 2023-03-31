<?php


namespace Ajian\Miniprogram\Api;


class GetAccessToken extends BaseApi
{
    public $grant_type = 'client_credential';
    private $appid;
    private $secret;

    public function request()
    {
        $uri = "https://api.weixin.qq.com/cgi-bin/token";
        $response = $this->client()->request('GET',$uri,[
            'query' => [
                'appid' => $this->appid,
                'secret' => $this->secret,
                'grant_type' => $this->grant_type
            ]
        ]);
        return new \Ajian\Miniprogram\Response\AccessToken($response);
    }

    public function setParams($params)
    {
        if (isset($params['appid'])){
            $this->appid = $params['appid'];
        }
        if (isset($params['secret'])){
            $this->secret = $params['secret'];
        }
    }
}