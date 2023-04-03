<?php


namespace Ajian\Miniprogram\Api;


class GetQRCode extends BaseApi
{
    private $access_token;
    public $path;       #扫码进入的小程序页面路径
    public $width;      #二维码的宽度，单位 px。默认值为430，最小 280px，最大 1280px
    public $auto_color; #默认值false；自动配置线条颜色，如果颜色依然是黑色，则说明不建议配置主色调
    public $line_color; #默认值{"r":0,"g":0,"b":0}
    public $is_hyaline; #默认值false；是否需要透明底色，为 true 时，生成透明底色的小程序码

    public function request()
    {
        $uri = "https://api.weixin.qq.com/wxa/getwxacode";
        $response = $this->client()->request('POST',$uri,[
            'query' => [
                'access_token' => $this->access_token,
            ],
            'json' => [
                'path' => $this->path
            ]
        ]);
        return new \Ajian\Miniprogram\Response\GetQRCode($response);
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
        if (isset($params['width'])){
            $this->width = $params['width'];
        }
        if (isset($params['auto_color'])){
            $this->auto_color = $params['auto_color'];
        }
        if (isset($params['line_color'])){
            $this->line_color = $params['line_color'];
        }
        if (isset($params['is_hyaline'])){
            $this->is_hyaline = $params['is_hyaline'];
        }
    }
}