<?php


namespace Ajian\Miniprogram\Response;


class QueryScheme extends BaseResponse
{
    private $scheme_info;
    private $visit_openid = null;

    public function init($content)
    {
        if (isset($content['scheme_info'])){
            $this->scheme_info = $content['scheme_info'];
        }
        if (isset($content['visit_openid'])){
            $this->visit_openid = $content['visit_openid'];
        }
    }

    public function getSchemeInfo(){
        return $this->scheme_info;
    }

    public function getVisitOpenid(){
        return $this->visit_openid;
    }
}