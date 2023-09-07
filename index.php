<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


define(
    'MY_PRIVATE_KEY',
    "-----BEGIN RSA PRIVATE KEY-----
		MIICXgIBAAKBgQDHikastc8+I81zCg/qWW8dMr8mqvXQ3qbPAmu0RjxoZVI47tvs
		kYlFAXOf0sPrhO2nUuooJngnHV0639iTTEYG1vckNaW2R6U5QTdQ5Rq5u+uV3pMk
		7w7Vs4n3urQ6jnqt2rTXbC1DNa/PFeAZatbf7ffBBy0IGO0zc128IshYcwIDAQAB
		AoGBALTNl2JxTvq4SDW/3VH0fZkQXWH1MM10oeMbB2qO5beWb11FGaOO77nGKfWc
		bYgfp5Ogrql4yhBvLAXnxH8bcqqwORtFhlyV68U1y4R+8WxDNh0aevxH8hRS/1X5
		031DJm1JlU0E+vStiktN0tC3ebH5hE+1OxbIHSZ+WOWLYX7JAkEA5uigRgKp8ScG
		auUijvdOLZIhHWq7y5Wz+nOHUuDw8P7wOTKU34QJAoWEe771p9Pf/GTA/kr0BQnP
		QvWUDxGzJwJBAN05C6krwPeryFKrKtjOGJIniIoY72wRnoNcdEEs3HDRhf48YWFo
		riRbZylzzzNFy/gmzT6XJQTfktGqq+FZD9UCQGIJaGrxHJgfmpDuAhMzGsUsYtTr
		iRox0D1Iqa7dhE693t5aBG010OF6MLqdZA1CXrn5SRtuVVaCSLZEL/2J5UcCQQDA
		d3MXucNnN4NPuS/L9HMYJWD7lPoosaORcgyK77bSSNgk+u9WSjbH1uYIAIPSffUZ
		bti+jc1dUg5wb+aeZlgJAkEAurrpmpqj5vg087ZngKfFGR5rozDiTsK5DceTV97K
		a3Y+Nzl+XWTxDBWk4YPh2ZlKv402hZEfWBYxUDn5ZkH/bw==
		-----END RSA PRIVATE KEY-----"
);



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


echo "TEST";
