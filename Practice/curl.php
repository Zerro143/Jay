<?php   
$url = "https://api.publicapis.org/entries";   
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$res = curl_exec($ch);   
//echo $res;   

echo"<pre>";
$data = json_decode($res,true);

print_r($data);
?>  