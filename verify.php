<?php
$access_token = 'd7OaMOaXTNklWdlypLrtO6vNUaBRvfs6TD+71BFkpDAwEgKyfhuBi3RIWuz5lzXX12nTbsnkHkvi9lgVn2Chxq4D3lBJ05EKskXWmkf3PFoSLRrec417XYwUKI3kr3mXQbi/agjbA/I9EqumRfepwwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;