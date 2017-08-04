<?php


namespace Dewart\SentimentApi;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SentimentApi {
    public $input;
    public $domain;
    private $url;
    private $key;
    private $accessKeyHeader;
    private $client;

    public function __construct($input, $domain = "") {
        $this->input = $input;
        $this->domain = $domain;
        $this->url = "https://getsentiment.p.mashape.com/";
        $this->key = "TVEZT9nV0pmshcnHpFcfhw3siu1qp1wZbGxjsnhGTDMRoU8b02";
        $this->accessKeyHeader = "X-Mashape-Key";
        $this->client = new Client([
            'headers' => [
                "Content-Type" => "application/x-www-form-urlencoded",
                $this->accessKeyHeader => $this->key,
                "Accept" => "application/json"
            ],
            'form_params' => [
                "annotate" => 1,
                "categories" => 1,
                'domain' => $this->domain,
                "intentions" => 1,
                "sentiment" => 1,
                "terms" => 1,
                "text" => $this->review
            ]
        ]);

        $this->callApi();
    }

    public function __set($name, $value) {
        return $this->_properties[$name] = $value;
    }

    public function __get($name) {
        return array_has($this->_properties, $name)
            ? $this->_properties[$name]
            : null;
    }

    private function callApi() {
        try {
            $response = $this->client->post($this->url);
            $json = $response->getBody()->getContents();
            if($response->getStatusCode() != 200 && empty($json)) {
                throw new \Exception();
            }
            Sentiment::parseJson($json);
        } catch (RequestException $e) {
            echo $e->getMessage();
        }
    }
}