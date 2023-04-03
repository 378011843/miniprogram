<?php
namespace Ajian\Miniprogram\Api;


class GetPhoneNumber extends BaseApi
{
    private $access_token;
    private $code;

    public function request()
    {
        $uri = "https://api.weixin.qq.com/wxa/business/getuserphonenumber";
        $response = $this->client()->request('POST',$uri,[
            'query' => [
                'access_token' => $this->access_token
            ],
            'json' => [
                'code' => $this->code
            ]
        ]);
        return new \Ajian\Miniprogram\Response\GetPhoneNumber($response);
    }

    public function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['code'])){
            $this->code = $params['code'];
        }
    }
}