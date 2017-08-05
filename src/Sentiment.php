<?php

namespace Dewart\SentimentApi;

use phpDocumentor\Reflection\Types\Object_;

class Sentiment {
    private static $objResponse;
    private static $jsonBody;

    /**
     * Use this to construct the Object all methods are called statically
     *
     * @param $json
     *
     */
    public static function parseJson($json) {
        self::$objResponse = collect(json_decode($json))->flatten()->toArray;
        self::$jsonBody = $json;
    }

    /**
     * @property int defection_int
     * @property int purchase_int
     */
    public static function getIntentions() {
        if(property_exists(self::$objResponse, 'intentions')) {
            return self::$objResponse->intentions;
        }
        return null;
    }

    /**
     * @property float neg
     * @property float neu
     * @property float pos
     */
    public static function getSentiment() {
        if(property_exists(self::$objResponse, 'sentiment')) {
            return self::$objResponse->sentiment;
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
    public static function getCategories() {
        if(property_exists(self::$objResponse, 'categories')) {
            return self::$objResponse->categories;
        }
        return null;
    }

    /**
     * XML formatted string of original text with detected sentiment, and categories
     * the doc tag encloses one document, the s tag encloses one sentence, the c tag encloses a clause
     * the k tags encloses a term.
     */
    public static function getText() {
        if(property_exists(self::$objResponse, 'text')) {
            return self::$objResponse->text;
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
    public static function getTerms() {
        if(property_exists(self::$objResponse, 'terms')) {
            return self::$objResponse->terms;
        }
        return null;
    }

    /**
     * Return the response body contents in JSON format to be stored in DB
     *
     * @return Json jsonBody
     */
    public static function getJson() {
        return self::$jsonBody;
    }
}