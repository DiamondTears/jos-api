<?php

namespace Wf\JosApi\Core;
class Sign
{
    /**
     * @describe jd 签名
     * @param $params
     * @param $appSecret
     * @return string
     * @author wf
     * @date 2021-09-30 14:22
     */
    public function JdSign($params, $appSecret)
    {
        ksort($params);
        $stringToBeSigned = $appSecret;
        foreach ($params as $k => $v) {
            if ("@" != substr($v, 0, 1)) {
                $stringToBeSigned .= "$k$v";
            }
        }
        unset($k, $v);
        $stringToBeSigned .= $appSecret;
        return strtoupper(md5($stringToBeSigned));
    }
}