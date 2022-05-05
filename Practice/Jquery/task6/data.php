<html>   
  <head>   
    <title>Pagination</title>   
    <link rel="stylesheet" href="/assets/bootstrap.css">   
    <link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  </head>   
  <body>   

    <div class="container justify-content-center" id = "datatable">   
        <br><br>
        <table class="table datatable" id="tda" >
            <thead>
                <tr>
                    <th>ID </th>
                    <th> API  </th>
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



   
    



    </body>   
    <script>
        $(document).ready(function(){
            $.ajax({
                url:"getdata.php",
                method:"post",
                success:function(data){
                    $("#content").html(data);
                    $("#tda").DataTable({
                        //"ajax":"getdata.php",
                        //"data": "data",
                        /*"columns":[
                            {data:id},
                            {data:api},
                            {data:description},
                            {data:auth},
                            {data:https},
                            {data:cors},
                            {data:link},
                            {data:cat},

                        ]*/
                })

                }
            });
        });
    </script>
</html>