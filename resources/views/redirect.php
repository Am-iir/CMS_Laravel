<?php


// init configuration
$clientID = '510656781544-7mi6tv1hpjq009bl4tp5ugp60a8m716k.apps.googleusercontent.com';
$clientSecret = 'KejuNJWBmlEi0NpmhmzzngUB';
$redirectUri = 'http://localhost/redirect.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

