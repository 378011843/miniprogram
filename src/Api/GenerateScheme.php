<?php


namespace Ajian\Miniprogram\Api;


use GuzzleHttp\Client;

/**
 * 获取scheme码 GenerateScheme
 * @package Ajian\Miniprogram\Api
 */
class GenerateScheme extends BaseApi
{

    private $access_token;
    //跳转到的目标小程序信息 [path,query,env_version]
    private $jump_wxa = [];
    private $is_expire;
    private $expire_time;
    private $expire_type;
    private $expire_interval;

    public function request()
    {
        $uri = "https://api.weixin.qq.com/wxa/generatescheme";
        $client = new Client();
        $response = $client->request('POST',$uri,[
            'query' => [
                'access_token' => $this->access_token
            ],
            'json' => $this->generateJson() ?: null
        ]);
        return new \Ajian\Miniprogram\Response\GenerateScheme($response);
    }

    public function generateJson(){
        $json = [];
        foreach (get_class_vars(self::class) as $key => $item) {
            if($this->$key && $key != 'access_token'){
                $json[$key] = $this->$key;
            }
        }
        return $json;
    }

    public function setParams($params)
    {
        if (isset($params['access_token'])){
            $this->access_token = $params['access_token'];
        }
        if (isset($params['jump_wxa'])){
            $this->jump_wxa = $params['jump_wxa'];
        }
        if (isset($params['is_expire'])){
            $this->is_expire = $params['is_expire'];
        }
        if (isset($params['expire_time'])){
            $this->expire_time = $params['expire_time'];
        }
        if (isset($params['expire_type'])){
            $this->expire_type = $params['expire_type'];
        }
        if (isset($params['expire_interval'])){
            $this->expire_interval = $params['expire_interval'];
        }
    }
}