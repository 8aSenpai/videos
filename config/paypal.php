<?php
return array(
    // set your paypal credential
    'client_id' => 'Ad78KCoBNLWytzqxnEnhs1oZh11ZIeVccZv8PW-2fo3JjOiVdLcDczQngTlUKnZPg8BM25-9B5HLP1Jt',
    'secret' => 'EMOFRFQIS0yLLWxl7HR4uc72LTXpNJ5I8AKZfuLDqdCAaK2RaxlIDJpvOY8jR7XzJFLvUwE1YX3rcNot',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);