<?php

namespace Wf\JosApi\Core;
class JdBase
{
    protected $httpRequest;
    protected $sign;
    protected $method;
    protected $apiParams;
    protected $publicParams;

    public function __construct($method, $publicParams,$apiParams)
    {
        $this->httpRequest = new Http();
        $this->sign = new Sign();
        $this->method = $method;
        $this->publicParams=$publicParams;
        $this->apiParams = $apiParams;
    }

    /**
     * @describe 公共请求参数
     * @param
     * @return void
     * @author wf
     * @date 2021-09-30 14:04
     */
    public function setPublicParams($params)
    {
        $this->publicParams = $params;
    }

    /**
     * @describe 获取公共请求参数
     * @return
     * @author wf
     * @date 2021-09-30 14:31
     */
    public function getPublicParams()
    {
        return $this->publicParams;
    }

    /**
     * @describe 设置请求参数
     * @param $params
     * @return void
     * @author wf
     * @date 2021-09-30 13:15
     */
    public function setApiParams($params)
    {
        $this->apiParams = $params;
    }

    /**
     * @describe 获取请求参数
     * @author wf
     * @date 2021-09-30 13:16
     */
    public function getApiParams()
    {
        $this->apiParams["method"] = $this->method;
        return $this->apiParams;
    }

}