<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "Start <br>";



// include your composer dependencies
require_once 'vendor/autoload.php';

// $client = new Google\Client();
$client = new Google_Client();
$client->setAuthConfig(__DIR__ . '/test.json');
$client->setScopes([
    'https://www.googleapis.com/auth/analytics.readonly'
]);

echo "TEST 1 <br>";

$analytics = new Google_Service_Analytics($client);
// $viewId = 'G-BMFLZ1BYDM';
$viewId = 5985740718;
echo $viewId . "<br>";
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
echo "<pre>";
print_r($arr);
echo "TEST";
