<?php
/**
 * Created by PhpStorm.
 * User: davide
 * Date: 8/4/17
 * Time: 4:22 PM
 */

namespace Dewart\SentimentApi;


use phpDocumentor\Reflection\Types\Object_;

class Sentiment {
    private static $objResponse;
    private static $jsonBody;
    public static function __construct($json)
    {
        self::$jsonBody = $json;
        self::$objResponse = self::parseJson($json);
    }

    public static function parseJson($json) {
        self::$objResponse = json_decode($json);
    }

    /**
     * @property int defection_int
     * @property int purchase_int
     */
    public static function getIntentions() {
        return self::$objResponse->intentions;
    }

    /**
     * @property float neg
     * @property float neu
     * @property float pos
     */
    public static function getSentiment() {
        return self::$objResponse->sentiment;
    }

    /**
     * object contains
     * @property string category
     * @property Object_ sentiment (same as properties for getSentiment)
     *
     * NOTE : Categories are only returned if the domain is set.
     */
    public static function getCategories() {
        return self::$objResponse->categories;
    }

    /**
     * XML formatted string of original text with detected sentiment, and categories
     * the doc tag encloses one document, the s tag encloses one sentence, the c tag encloses a clause
     * the k tags encloses a term.
     */
    public static function getText() {
        return self::$objResponse->text;
    }

    /**
     * object contains
     * @property int count
     * @property string id
     * @property Object_ sentiment (same as properties for getSentiment)
     * @property string term
     */
    public static function getTerms() {
        return self::$objResponse->intentions;
    }

    /**
     * Return the response body contents in JSON format to be stored in DB
     *
     * @return Json jsonBody
     */
    public static function getJson() {
        return self::$objResponse->intentions;
    }
}