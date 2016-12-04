<?php
/**
 * Created by PhpStorm.
 * User: xgaldones
 * Date: 11/6/16
 * Time: 8:46 PM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class ApiRequestController extends Controller
{
    private $method;
    private $urlReq;
    private $params = [];
    private $apiClient;

    public function __construct($urlReq, $method = 'GET', $params = [])
    {
        $this->method = $method;
        $this->urlReq = $urlReq;
        $this->params = $params;
    }

    public function getRawApiRequest()
    {
        $client = new \GuzzleHttp\Client();
        return $client->request('GET', $this->urlReq, $this->params);
    }

    public function getApiRequest()
    {
        $client = new \GuzzleHttp\Client();

        if($this->method == 'POST')
        {
            $this->params = ['form_params' => $this->params ];
        }

        $result = $client->request($this->method, $this->urlReq, $this->params);
        if( $result->getStatusCode() == 200)
        {
            return (string)$result->getBody();
        } else {
            echo 'cannot get data @ ' . $this->urlReq;
        }
    }



    public function postApiRequest()
    {
        $client = new \GuzzleHttp\Client();
        return $client->request('POST', $this->urlReq, $this->params);
    }


    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @param mixed $urlReq
     */
    public function setUrlReq($urlReq)
    {
        $this->urlReq = $urlReq;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getUrlReq()
    {
        return $this->urlReq;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

}