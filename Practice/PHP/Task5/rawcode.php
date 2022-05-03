<?php

// Student JSON data
$jsondata =
'[
{"student":"sravan kumar","age":22,"subject":"java"},
{"student":"ojaswi","age":21,"subject":"java"},
{"student":"rohith","age":22,"subject":"dbms"},
{"student":"bobby","age":22,"subject":"sql"}]';

// Decode json data and convert it
// into an associative array
$jsonans = json_decode($jsondata, true);

// CSV file name => geeks.csv
$csv = 'geeks.csv';

// File pointer in writable mode
$file_pointer = fopen($csv, 'w');

// Traverse through the associative
// array using for each loop
foreach($jsonans as $i){
	
	// Write the data to the CSV file
	fputcsv($file_pointer, $i);
}

// Close the file pointer.
fclose($file_pointer);

?>

<?php 
	include 'conn.php';
	$sql = "SELECT * FROM apidata";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	$a = $result->num_rows;
	echo $a;						
        
?>