<?php   
include 'conn.php';
$url = "https://api.publicapis.org/entries";   
$ch = curl_init();   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
curl_setopt($ch, CURLOPT_URL, $url);   
$res = curl_exec($ch);   
//echo $res;   



echo"<pre>";
$data = json_decode($res,true);



//print_r($data['entries']);

for($i=0; $i<=count($data['entries']); $i++){
    
    $api = $data['entries'][$i]['API'];
    $des = $data['entries'][$i]['Description'];
    $auth = $data['entries'][$i]['Auth'];
    $https = $data['entries'][$i]['HTTPS'];
    $cors = $data['entries'][$i]['Cors'];
    $link = $data['entries'][$i]['Link'];
    $cat = $data['entries'][$i]['Category'];

    $r1 = "SELECT * FROM api  data WHERE linl = '$link';";
    mysqli_query($conn,$query);
    $count = mysqli_num_rows($r1);

    $query="INSERT INTO apidata VALUES('$api','$des','$auth','$https','$cors','$link','$cat')";
    mysqli_query($conn,$query);
    //echo "$api <br> $des <br> $auth <br> $https<br> $cors <br> $link <br> $cat";
    //echo $query."<br>";

}
?>  