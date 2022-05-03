<html>   
  <head>   
    <title>Pagination</title>   
    <link rel="stylesheet" href="bootstrap.css">   
    <style>   
    table {  
        border-collapse: collapse;  
    }  
        .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }   
         
        input, button{   
            height: 34px;   
        }   
  
    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;  
        border-radius: 10px; 
    }   
    .pagination a.active {   
            background-color: skyblue;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: Gray;   
    }   
        </style>   
  </head>   
  <body>   
  <center>  
    <?php  
      
    // Import the file where we defined the connection to Database.     
        require_once "conn.php";   
    
        $per_page_record = 25;  // Number of entries to show in a page.   
        // Look for a GET variable page if not found default is 1.        
        if (isset($_GET["page"])) {    
            $page  = $_GET["page"];    
        }    
        else {    
          $page=1;    
        }    
    
        $start_from = ($page-1) * $per_page_record;   
        
        
        
       //$query = "SELECT * FROM apidata LIMIT $start_from, $per_page_record";     
        //$rs_result = mysqli_query ($conn, $query);    
    ?>    
  
    <div class="container">   
      <br>   
      <div>   
        
        <table class="table datatable" id = "datatable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>API</th>
                  <th>Description</th>
                  <th>Auth</th>
                  <th>HTTPS</th>
                  <th>CORS</th>
                  <th>LINKS</th>
                  <th>Catag</th>
                
                </tr>
              </thead>
               
                <?php
                   
                    $sql = "SELECT * FROM apidata LIMIT $start_from, $per_page_record";   
                    $result = $conn->query($sql); 

                  // output data of each row
                  while($row = $result->fetch_assoc()):?> 
                  <div class="row" justify-content-center>
                    <tr>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['api'];?></td>
                      <td><?php echo $row['description'];?></td>
                      <td><?php echo $row['auth'];?></td>
                      <td><?php echo $row['https'];?></td>
                      <td><?php echo $row['cors'];?></td>
                      <td><?php echo $row['link'];?></td>
                      <td><?php echo $row['cat'];?></td>
                                               
                    </tr>
                  </div>  
                <?php endwhile;?>
            </table>   
  
     <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM apidata";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
        echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a class ='btn'id ='$i' value =".($page-1)." href='data2.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
            if ($i == $page) {   
              $pagLink .= "<a  value ='$i' class = 'active btn' href='data2.php?page=" .$i."'>".$i."</a>";   
            }               
            else{   
                if($i == ($page-1)){
               
                    $pagLink .= "<a  class ='btn'id ='$i' value ='$i'href='data2.php?page=".$i."'>  ".$i." </a>";   
                    
                    }

              if($i == ($page+1)){
               
                $pagLink .= "<a  class ='btn' value ='$i id ='$i' href='data2.php?page=".$i."'>  ".$i." </a>";   
                
                }
             
            }  
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a class ='btn'id ='$i' value =".($page+1)." href='data2.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
  
  
      <div class="inline">   
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div>    
    </div>   
  </div>  
</center>   
  <script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'data2.php?page='+page;   
    }
    
    $(".btn").click(function(){
        var a = $(this).val();
        $.ajax({url:"data2.php"});
    });


    
  </script>  
  </body>   
</html>