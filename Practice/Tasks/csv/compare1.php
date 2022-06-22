<?php
//for errors

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$out = fopen("final.csv","w");

$csv1 = fopen("ay1.csv","r");

$header= fgetcsv($csv1, 1000);
echo "<pre> Head data\n";
print_r($header);
fputcsv($out,$header);

while(($data=fgetcsv($csv1))!== FALSE){
    $array[]=$data;
}
fclose($csv1);
//echo "<pre>";
//print_r($array);
$csv2 = fopen("ay2.csv","r");

$header= fgetcsv($csv2, 1000);
//  echo "<pre> Head data\n";
//  print_r($header);
while(($data=fgetcsv($csv2))!== FALSE){
    $array2[]=$data;
}
fclose($csv2);

foreach($array as $itm){
    foreach($array2 as $itm2){
   
        if($itm[10]==$itm2[1]){
            $itm[14]=$itm2[4];
            continue;
        }
        
    }
    print_r($itm);
    fputcsv($out,$itm);
}
fclose($out);
  


?>