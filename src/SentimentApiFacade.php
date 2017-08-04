<?php
namespace Dewart\SentimentApi;

use Illuminate\Support\Facades\Facade;

class SentimentApiFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'sentiment-api';
    }
}