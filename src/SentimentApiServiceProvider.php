<?php
/**
 * Created by PhpStorm.
 * User: davide
 * Date: 8/4/17
 * Time: 4:00 PM
 */

namespace Dewart\SentimentApi;


class SentimentApiServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('', function ($app) {
            return new StdClass($app->make(''));
        });
        $this->app->singleton(SentimentApi::class, function () {
            return new SentimentApi();
        });
        $this->app->alias(SentimentApi::class, 'sentiment-api');
    }
}