<?php
header('Content-Type: text/html; charset=utf-8');


$url1="http://dwarfpool.com/eth/api?wallet=0xE058B32A21b8C3B5BBfba621B4c94eC834e4BA9e&email=jason_bomb@me.com";

$ch1 = curl_init();
// Disable SSL verification
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch1, CURLOPT_URL,$url1);
// Execute
$result1=curl_exec($ch1);
// Closing
curl_close($ch1);
$data1 = json_decode($result1,true);


$s_date = $data1["last_share_date"];
$datetime = explode(" ", $s_date);
//echo $datetime [0] . "\r\n"; // piece1
//echo $datetime [1] . "\r\n"; // piece2
//echo $datetime [2] . "\r\n"; // piece2
//echo $datetime [3] . "\r\n"; // piece2

$selectedTime = $datetime [4];
$endTime = strtotime("+420 minutes", strtotime($selectedTime));
//echo date('h:i:s', $endTime);




$url="https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,USD,THB";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
$data = json_decode($result,true);
//echo  "THB :" ; echo $data["THB"];

$balance = $data1["wallet_balance"];
$thb_rate =  +$data["THB"] ;
$total = +$balance * +$thb_rate;




echo  "แชร์ครั้งล่าสุด : " . $datetime [0] . " " .$datetime [1] . " " . $datetime [2] . " " . $datetime [3] . " " . date('h:i:s', $endTime) .  "\r\n";
echo  "ยอด ETH : " . $data1["wallet_balance"] . " ETH" . "\r\n";
echo  "คิดเป็นเงินบาท : " . $total . " THB" . "\r\n";
echo  "1 ETH เท่ากับ : " . $data["THB"] . " THB" . "\r\n";
echo  "ยอดขุดใน 24 ชั่วโมง : " . $data1["earning_24_hours"] . " ETH" . "\r\n";
echo  "Error Status : " . $data1["error_code"] . "\r\n";
echo  "ยอดที่ยังไม่ยืนยัน : " . $data1["immature_earning"] . " ETH" . "\r\n";





?>
