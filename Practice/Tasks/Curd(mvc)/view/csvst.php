<?php

include_once 'conn.php';
 
if(!empty($_FILES["file"]["name"]))
{
 
    
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 

            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 
            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                // Get row data
                $fname = $getData[0];
                $lname = $getData[1];
                $email = $getData[2];
                $m = $getData[3];
                $course = $getData[4];
                $bdate = $getData[5];
                $cdate = $getData[6];
                $udate = $getData[7];

                $cr =  "SELECT course_id FROM course WHERE course = '$course'";
                $cr = mysqli_query($conn, $cr);
                $cr = mysqli_fetch_array($cr);
                   
                
                // If user already exists in the database with the same email
                $query = "SELECT * FROM student WHERE email = '$email'";
                //echo $query;
                
                $check = mysqli_query($conn, $query);
                $tr = $check->num_rows;
                //echo $tr."<br>";
                //exit;
                
                if ($tr == 0)
                {  
                    $s = "INSERT INTO student (`fname`, `lname`, `email`, `m`, `course_id`, `bdate`, `created_date`,`update_date`) VALUES ('$fname','$lname','$email','$m','$cr[0]','$bdate','$cdate','$udate')";
                    
                    // echo $s."<br>";
                   mysqli_query($conn, $s);
                    

                   //echo 50;
                }
                else
                {   
                    //  echo $cr[0];
                    // exit;
                    $u = "UPDATE student SET `fname` = '$fname', `lname` = '$lname' , `email` = '$email' , `m` = $m , `course_id` = '$cr[0]' , `bdate` = '$bdate', `update_date`= '$udate'";
                    echo $u."<br>";
                    
                    
                      mysqli_query($conn, $u);
                    //echo 51;
                    
    
                 
 
                }
            }
 
            // Close opened CSV file
            fclose($csvFile);
 
            echo "Success";
         
    }
    else
    {
        echo "Error1";
    }
}else{
  echo "Error2";  
}