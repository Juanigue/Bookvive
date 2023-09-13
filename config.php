<?php

// Product Details 
$itemNumber = "DP12345";
$itemName = "Demo Product";
$itemPrice = 75;
$currency = "USD";

/* PayPal REST API configuration 
 * You can generate API credentials from the PayPal developer panel. 
 * See your keys here: https://developer.paypal.com/dashboard/ 
 */
define('PAYPAL_SANDBOX', TRUE); //TRUE=Sandbox | FALSE=Production 
define('PAYPAL_SANDBOX_CLIENT_ID', 'AefKaj1S_FAMuJ5iMEevkt_ecyRm0DAVK_N657DSyUAggf8ALyIMvZfJxwSf--7hN535nAJH_R1De0Dd');
define('PAYPAL_SANDBOX_CLIENT_SECRET', 'EBtbRhcYUtkrKMRgLhdyl3voB1LtzxboiRFNTqwHGwdRqCmj9F9Op8AtyPPsCS7W6dUpqfh1-VVwDlMa');
define('PAYPAL_PROD_CLIENT_ID', 'sb-543x5u27380172@personal.example.com');
define('PAYPAL_PROD_CLIENT_SECRET', 'j?!.3BTg');

// Database configuration  
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'rol');

?>