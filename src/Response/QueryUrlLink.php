<?php


namespace Ajian\Miniprogram\Response;


class QueryUrlLink extends BaseResponse
{
    private $url_link_info;
    private $visit_openid = null;

    public function init($content)
    {
        if (isset($content['url_link_info'])){
            $this->url_link_info = $content['url_link_info'];
        }
        if (isset($content['visit_openid'])){
            $this->visit_openid = $content['visit_openid'];
        }
    }

    public function getUrlLinkInfo(){
        return $this->scheme_info;
    }

    public function getVisitOpenid(){
        return $this->visit_openid;
    }
}