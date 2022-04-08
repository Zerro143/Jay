            <?php 
            include 'conn.php';
                $sql = "SELECT * FROM `course`;"; 
                $result = $conn->query($sql); 
                // output data of each row
              
            ?> 
         
                <select>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <option value="<?php echo $row['course'];?>"><?php echo $row['course'];?> </option>
                                                        
                    <?php endwhile;?>
                </select>       
                <?php

function valid_phone($phone)
{
    return preg_match('/^[0-9]{10}+$/', $phone);
}
if(valid_phone(1234567890)){
    echo "Your phone number is valid.";
}else{
    echo "Sorry, Your phone number is invalid.";
}
$DOB = strtotime("today");
if (!checkdate($DOB)) {
    $error_message = 'Invalid Date';
}
?>



                
              