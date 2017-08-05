# Sentiment-API

### Class SenitmentApi Usage
```php
    // SentimentAPi makes the API call and sends the JSON to Sentiment::parseJson($json)
    // you will need to change key or setup to have a test / production key based on environment
    new SentimentApi($input); // domain (second parameter) is optional, but required to recieve categories
```

### Sentiment Usage
```php
    // Once the api has been called you can use the Sentiment Facade to statically access all methods and properties
    Sentiment::parseJson(); // Accepts a JSON string to parse to the object
    Sentiment::getIntentions(); // Returns Intentions if exists else null
    Sentiment::getSentiment(); // Returns Sentiment if exists else null
    Sentiment::getCategories(); // Returns Categories if exists else null
    Sentiment::getText(); // Returns Text if exists else null
    Sentiment::getTerms(); // Returns Terms if exists else null
    Sentiment::getJson(); // returns original JSON
```
