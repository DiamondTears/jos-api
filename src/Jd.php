<?php

namespace Wf\JosApi;

use Wf\JosApi\Core\JdBase;

class Jd extends JdBase
{
    /**
     * @describe 执行请求
     * @param
     * @return
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author wf
     * @date 2021-09-30 13:07
     */
    public function execute()
    {
        // 获取参数 包含公共参数和api请求参数
        $p = array_merge($this->getPublicParams(), $this->getApiParams());
        // 签名
        $sign = $this->sign->JdSign($p, $this->publicParams['app_secret']);
        // 签名加入参数
        $p['sign'] = $sign;
        // 获取接口数据
        return $this->httpRequest->HttpGet($this->publicParams['url'], $this->publicParams['uri'], $p);
    }

}