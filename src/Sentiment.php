<?php

namespace Dewart\SentimentApi;

use phpDocumentor\Reflection\Types\Object_;

class Sentiment {
    private $jsonBody;
    private $objResponse;

    private function __construct($obj, $json) {
        $this->jsonBody = $json;
        $this->objResponse = $obj;
    }

    /**
     * Use this to construct the Object
     *
     * @param $json
     *
     */
    public static function parseJson($json) {
        $objResponse = collect(json_decode($json))->flatten()->first();
        return new self($objResponse, $json);
    }

    /**
     * @property int defection_int
     * @property int purchase_int
     */
    public function getIntentions() {
        if(property_exists($this->objResponse, 'intentions')) {
            return $this->objResponse->intentions;
        }
        return null;
    }

    /**
     * @property float neg
     * @property float neu
     * @property float pos
     */
    public function getSentiment() {
        if(property_exists($this->objResponse, 'sentiment')) {
            return $this->objResponse->sentiment;
        }
        return null;
    }

    /**
     * object contains
     * @property string category
     * @property Object_ sentiment (same as properties for getSentiment)
     *
     * NOTE : Categories are only returned if the domain is set.
     */
    public function getCategories() {
        if(property_exists($this->objResponse, 'categories')) {
            return $this->objResponse->categories;
        }
        return null;
    }

    /**
     * XML formatted string of original text with detected sentiment, and categories
     * the doc tag encloses one document, the s tag encloses one sentence, the c tag encloses a clause
     * the k tags encloses a term.
     */
    public function getText() {
        if(property_exists($this->objResponse, 'text')) {
            return $this->objResponse->text;
        }
        return null;
    }

    /**
     * object contains
     * @property int count
     * @property string id
     * @property Object_ sentiment (same as properties for getSentiment)
     * @property string term
     */
    public function getTerms() {
        if(property_exists($this->objResponse, 'terms')) {
            return $this->objResponse->terms;
        }
        return null;
    }

    /**
     * Return the response body contents in JSON format to be stored in DB
     *
     * @return Json jsonBody
     */
    public function getJson() {
        return $this->jsonBody;
    }
}