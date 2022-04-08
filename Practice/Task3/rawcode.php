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



                
              