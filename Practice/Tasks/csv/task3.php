<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$out = fopen("final2.csv","w");
$mydir = "img";

$files = array_diff(scandir($mydir), array('.', '..'));
// foreach($files as $file){
//   $array2[] = substr($file, 0, strpos($file, "."));
// }
echo "<pre>";
// print_r($array2);

$csv1 = fopen("img/cust.csv","r");
$header= fgetcsv($csv1, 1000);
//print_r($header);
while(($data=fgetcsv($csv1))!== FALSE){
    $array[]=$data;
}
fclose($csv1);
//print_r($array);

foreach($array as $itm){

    foreach($files as $itm2){

        $ptr = substr($itm2, 0, strpos($itm2, "."));
        if($ptr == $itm[0]){
            $itm[1]=$itm2;
            continue;
        }
        //echo $file."<br>";
        
    }   
    //echo $itm[0]."<br>";
    print_r($itm);
    fputcsv($out,$itm);
    
}
fclose($out);
// $result=array_intersect($files,$a2);
// print_r($result);
?>