<?php


namespace Ajian\Miniprogram\Api;


use GuzzleHttp\Client;

class GenerateUrlLink extends BaseApi
{
    private $access_token;
    //跳转到的目标小程序信息 [path,query,env_version]
    private $path;
    private $query;
    private $is_expire;
    private $expire_time;
    private $expire_type;
    private $expire_interval;
    private $cloud_base;
    private $env_version;

    public function request()
    {
        $uri = "https://api.weixin.qq.com/wxa/generate_urllink";
        $client = new Client();
        $response = $client->request('POST',$uri,[
            'query' => [
                'access_token' => $this->access_token
            ],
            'json' => $this->generateJson() ?: null
        ]);
        return new \Ajian\Miniprogram\Response\GenerateUrlLink($response);
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
        if (isset($params['path'])){
            $this->path = $params['path'];
        }
        if (isset($params['query'])){
            $this->query = $params['query'];
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
        if (isset($params['cloud_base'])){
            $this->cloud_base = $params['cloud_base'];
        }
        if (isset($params['env_version'])){
            $this->env_version = $params['env_version'];
        }
    }
}