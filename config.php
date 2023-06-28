<?php

//start session on web page


//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('545488256104-3ob8099rsaee0m22r324s0m0k07dkeed.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/jinesh/SIGNUP/signup.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>