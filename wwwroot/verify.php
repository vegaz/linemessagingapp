<?php
$access_token = 'HQovaDzjjVf69u+Tea0aLHw481ctpJmHmibhotCwwizg47ly57r8gjcTPQpDETHLAVta/Uy1DZezHAQQgrjBFr17e1fjhmwiffD1lUhFmTfRFYo/6P8NAQOeBfBulttd9e8W0LtQir8HKYgEPEFvkQdB04t89/1O/w1cDnyilFU=';



$proxy = 'velodrome.usefixie.com:80';
$proxyauth = 'fixie:VjDwel54cX5u91T';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;