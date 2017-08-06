# Sentiment-API

### Class SenitmentApi Usage
```php
    // Use SentimentAPi to make the API call that sends the JSON to Sentiment::parseJson($json)
    // you will need to change key or setup to have a test / production key based on environment
    $myObj = new SentimentApi($input); // domain (second parameter) is optional, but required to recieve categories
    $sentiment = $myobj->callApi(); // returns the sentiment object
```

### Sentiment Usage
```php
    // THe API passes the response body to parseJson() and returns the object. 
    //Alternitevley you can statically call parseJson() passing in the JSON to reconstruct the object
    $sentiment = Sentiment::parseJson($json); // Accepts a JSON string to parse to the object
    $sentiment->getIntentions(); // Returns Intentions if exists else null
    $sentiment->getSentiment(); // Returns Sentiment if exists else null
    $sentiment->getCategories(); // Returns Categories if exists else null
    $sentiment->getText(); // Returns Text if exists else null
    $sentiment->getTerms(); // Returns Terms if exists else null
    $sentiment->getJson(); // returns original JSON
```
