<?php

namespace Wf\JosApi\Core;

use GuzzleHttp\Client;

class Http
{
    /**
     * @describe http get
     * @param $url
     * @param $uri
     * @param array $query
     * @param array $header
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author wf
     * @date 2021-09-30 13:19
     */
    public function HttpGet($url, $uri, $query = [], $header = [])
    {
        try {

            $client = new Client(['base_uri' => $url]);
            $header['charset'] = 'UTF-8';
            if (isset($header["Content-Type"]) || empty($header["Content-Type"])) {
                $header['Content-Type'] = 'application/x-www-form-urlencoded';
            }
            $res = $client->get(
                $uri,
                array(
                    'query' => $query,
                    'headers' => $header,
                )
            );
            $body = $res->getBody();
            $contents = $body->getContents();
            $data = $contents;
            $code = $res->getStatusCode();
            return $data;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @describe http post 暂时不使用
     * @param
     * @return
     * @author wf
     * @date 2021-09-30 14:40
     */
    public function HttpPost()
    {

    }
}