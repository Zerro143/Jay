<html>   
  <head>   
    <title>Pagination</title>   
    <link rel="stylesheet" href="bootstrap.css">   
    <style>   
    table {  
        border-collapse: collapse;  
    }  
     
    input, button{   
        height: 34px;   
        width: 48px;
        margin-top: 5px;
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
    .search {
        width: 250px;
        
    }   
    .searchbtn{
        background-color: skyblue;
        width: fit-content;
    }
        </style>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>   
  <body>   
    <br>
    <br>
    <div class="container justify-content-center">
      <div class="row">
          <div class="col">
                <select class="selector" id="selector">
                    <option value='5'>5</option>
                    <option value='10'selected>10</option>
                    <option value='25'>25</option>
                </select>
            </div>
            <div class="col ">
                <input type="search" class="search " placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="searchbtn">Search</button>
            </div>
        </div>

    </div>
  
     

    <div class="container justify-content-center" id = "datatable">   
        <br><br>
        <table class="table datatable" >
            <thead>
                <tr>
                    <th>ID </th>
                    <th id="asd" value="ASC"> API  </th>
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
    <center>
    <div class="container justify-content-center"></div>
         
            
                <div class ="pagination" id="pagination">

                </div>
         
           
            <div id="go"class="col">
              <input id="pagego" type="number" min="1" max=""placeholder="" required/>   
              <button id="btn btn-primary" id="go">Go</button> 
            </div>
        
    </div>
    </center>


   
    


        <script>   
        
    
            $(document).ready(function(){
                var val = $("#selector").val();     
                $.ajax({url: "getdata.php", 
                    method:"post",
                    data:{sel:val},
                    success: function(result){
                        

                    $("#content").html(result);
                    var tp = $("#tt").val();
                    var page = parseInt($("#page").val());
                    var record =$("#records").val();
                    $("#selector").val(record);
                  
                    $("#pagination").empty();
                    if(page>=2){
                        $("#pagination").append("<a class = 'btn' value ="+(page-1)+">  Prev </a>")
                    }
                    for (var i=1; i<=tp; i++){
                        if(i == page){
                            $("#pagination").append("<a class = 'btn active' value ="+i+"> "+i+" </a>")
                            
                            
                        }
                        
                        else{
                           
                            if(i == (page-1)){
                                $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+"</a>")
                                
                            }
                            if(i == (page+1)){
                                $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+" </a>")
                              
                            }
                        }
                     
                        
                    }

                    if(page<tp){
                        $("#pagination").append("<a class = 'btn' value ="+(page+1)+">Next</a>")
                        
                    }
                    
                    

                
          
                }
            });
               
              $("#asd").click(function(e){
                    e.preventDefault();
                    var page = $("#page").val();
                    var val = $("#selector").val();
                    var asd = $("#asd").attr("value");
                    
                    
                    $.ajax({url: "getdata.php",
                    method:"post",
                    data:{page:page,sel:val,sort:asd},
                    success: function(a){
                        // $('#content').load(document.URL +  ' #content');
                        $("#content").html(a);
                        var tp = $("#tt").val();
                        var page = parseInt($("#page").val());
                        var record =$("#records").val();
                        
                        $("#asd").attr("value","DESC")

                        $("#selector").val(record);
                   
                        
                        $("#pagination").empty();
                                if(page>=2){
                                $("#pagination").append("<a class = 'btn' value ="+(page-1)+">  Prev </a>")

                                }
                                for (var i=1; i<=tp; i++){
                                    if(i == page){
                                       $("#pagination").append("<a class = 'btn active' value ="+i+"> "+i+" </a>")
                            
                            
                                    }
                        
                                    else{
                           
                                        if(i == (page-1)){
                                            $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+"</a>")
                                            
                                        }
                                        if(i == (page+1)){
                                            $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+" </a>")
                                            
                                        }
                                    }
                     
                        
                                }

                                if(page<tp){
                                    $("#pagination").append("<a class = 'btn' value ="+(page+1)+">Next</a>")
                        
                                }
                    }});
                
                
                });
               
       
                
                
                $("#go").click(function(e){
                    e.preventDefault();
                    var page = $("#pagego").val();
                    var val = $("#selector").val();
                    var asd = $("#sort").val();
                    
                    $.ajax({url: "getdata.php",
                    method:"post",
                    data:{page:page,sel:val,sort:asd},
                    success: function(a){
                        // $('#content').load(document.URL +  ' #content');
                        $("#content").html(a);
                        var tp = $("#tt").val();
                        var page = parseInt($("#page").val());
                        var record =$("#records").val();
                        $("#selector").val(record);
                   
                        
                        $("#pagination").empty();
                                if(page>=2){
                                $("#pagination").append("<a class = 'btn' value ="+(page-1)+">  Prev </a>")

                                }
                                for (var i=1; i<=tp; i++){
                                    if(i == page){
                                       $("#pagination").append("<a class = 'btn active' value ="+i+"> "+i+" </a>")
                            
                            
                                    }
                        
                                    else{
                           
                                        if(i == (page-1)){
                                            $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+"</a>")
                                            
                                        }
                                        if(i == (page+1)){
                                            $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+" </a>")
                                            
                                        }
                                    }
                     
                        
                                }

                                if(page<tp){
                                    $("#pagination").append("<a class = 'btn' value ="+(page+1)+">Next</a>")
                        
                                }
                    }});
                
                
                });

                $("#selector").change(function(e){
                    e.preventDefault();
                    var val = $(this).val();
                    var page = $("#page").val();
                    var asd = $("#sort").val();
                   
                    $.ajax(
                        {
                            url:"getdata.php",
                            method:"post",
                            data:{sel:val,page:page,sort:asd},
                            success: function(a){
                                $("#content").html(a);
                                var tp = $("#tt").val();
                                var page = parseInt($("#page").val());
                                 
                                 var record =$("#records").val();
                                    $("#selector").val(record);
                                    $("#pagination").empty();
                  
                                if(page>=2){
                                $("#pagination").append("<a class = 'btn' value ="+(page-1)+">  Prev </a>")
                                }
                                for (var i=1; i<=tp; i++){
                                    if(i == page){
                                       $("#pagination").append("<a class = 'btn active' value ="+i+"> "+i+" </a>")
                            
                            
                                    }
                        
                                    else{
                           
                                        if(i == (page-1)){
                                            $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+"</a>")
                                
                                        }
                                        if(i == (page+1)){
                                            $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+" </a>")
                              
                                        }
                                    }
                     
                        
                                }

                                if(page<tp){
                                    $("#pagination").append("<a class = 'btn' value ="+(page+1)+">Next</a>")
                        
                                }
                            }
                         
                        }
                    );


                });

               


              
              
                $("#pagination").on("click",".btn",function(e){
                    e.preventDefault();
                    var page = $(this).attr("value");
                    var val = $("#selector").val();
                    var asd = $("#sort").val();
                    
                    $.ajax({url: "getdata.php",
                    method:"post",
                    data:{page:page,sel:val,sort:asd},
                    success: function(a){
                        // $('#content').load(document.URL +  ' #content');
                        $("#content").html(a);
                        var tp = $("#tt").val();
                        var page = parseInt($("#page").val());
                        var record =$("#records").val();
                        $("#selector").val(record);
                   
                        
                        $("#pagination").empty();
                                if(page>=2){
                                $("#pagination").append("<a class = 'btn' value ="+(page-1)+">  Prev </a>")

                                }
                                for (var i=1; i<=tp; i++){
                                    if(i == page){
                                       $("#pagination").append("<a class = 'btn active' value ="+i+"> "+i+" </a>")
                            
                            
                                    }
                        
                                    else{
                           
                                        if(i == (page-1)){
                                            $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+"</a>")
                                            
                                        }
                                        if(i == (page+1)){
                                            $("#pagination").append("<a class = 'btn ' value ="+i+"> "+i+" </a>")
                                            
                                        }
                                    }
                     
                        
                                }

                                if(page<tp){
                                    $("#pagination").append("<a class = 'btn' value ="+(page+1)+">Next</a>")
                        
                                }
                    }});
                
                
                });
            
            });

    
        </script>  
    </body>   
</html>