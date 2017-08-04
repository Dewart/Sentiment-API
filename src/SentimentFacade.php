<?php
/**
 * Created by PhpStorm.
 * User: davide
 * Date: 8/4/17
 * Time: 5:26 PM
 */

namespace Dewart\SentimentApi;

use Illuminate\Support\Facades\Facade;

class SentimentFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'sentiment';
    }
}