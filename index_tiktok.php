<?php 

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://tiktok-full-video-info-without-watermark.p.rapidapi.com/?url=https://www.tiktok.com/@pepsi/video/7132906413705350446",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: tiktok-full-video-info-without-watermark.p.rapidapi.com",
		"X-RapidAPI-Key: ff078c14c7msh2d5de6e3bfd8c21p140effjsn8563ac8d6719"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

?>