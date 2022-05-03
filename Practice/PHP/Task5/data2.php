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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>   
  <body>   
  <center>  
    
    
    <div id="x">
    <?php $per_page_record = 10 ;?>
    <input type="hidden" id="no of records" value ="<?php echo $per_page_record ?>">
       
    </div>
  
    <div class="container justify-content-center" id = "datatable">   
        <br><br>
        <table class="table datatable" >
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
            <tbody id="content">

            </tbody>
               
               
        </table>   
    </div>

    <div class="pagination">    
      <?php  
      require_once "conn.php";   
      $page=1;  
        $query = "SELECT COUNT(*) FROM apidata";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
        echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        
        //$pagLink = "";       
      
        if($page>=2){   
            echo "<a class ='btn' value =".($page-1).">  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
            if ($i == $page) {   
              $pagLink .= "<a  value ='$i' class = 'active btn'>".$i."</a>";   
            }               
            else{   
                if($i == ($page-1)){
               
                    $pagLink .= "<a  class ='btn'id ='$i' value ='$i'>  ".$i." </a>";   
                    
                    }

              if($i == ($page+1)){
               
                $pagLink .= "<a  class ='btn' value ='$i' id ='$i'>  ".$i." </a>";   
                
                }
             
            }  
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a class ='btn'id ='$i' value =".($page+1).">  Next </a>";   
        }   
  
      ?>    
    </div>  
  
    

</center>   
  <script>   
    
    $(document).ready(function(){
      
        $.ajax({url: "getdata.php", 
            success: function(result){
                $("#content").html(result);
        }});

        $(".btn").click(function(e){
            e.preventDefault();
            var page = $(this).attr("value");
            $.ajax({url: "getdata.php",
            method:"post",
            data:{page:page},
            success: function(){
                $('#datatable').load(document.URL +  ' #datatable');
                
                
            }});


        });

    });
    




  
    

    
  


    
  </script>  
  </body>   
</html>