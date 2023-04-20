<?php


namespace Ajian\Miniprogram\Response;


class GenerateUrlLink extends BaseResponse
{
    private $url_link;

    public function init($content)
    {
        if(isset($content['url_link'])){
            $this->url_link = $content['url_link'];
        }
    }

    public function getUrlLink(){
        return $this->url_link;
    }
}