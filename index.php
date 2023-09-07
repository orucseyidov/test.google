<?php
// include your composer dependencies
require_once 'vendor/autoload.php';

// $client = new Google\Client();
$client = new Google_Client();
$client->setAuthConfig(__DIR__ . '/test.json');
$client->setScopes([
    'https://www.googleapis.com/auth/analytics.readonly'
]);

$analytics = new Google_Service_Analytics($client);
$viewId = 'G-BMFLZ1BYDM';
$result = $analytics->data_realtime->get(
    'ga:' . $viewId,
    'rt:activeVisitors',
    [
        'dimensions' => 'rt:pagePath,rt:country,rt:city,rt:longitude,rt:latitude'
    ]
);

$arr = [
    'online' => $result->getTotalResults(),
    'data' => $result->getRows()
];
