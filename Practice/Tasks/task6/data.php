<html>   
  <head>   
    <title>Pagination</title>   
    <!-- <link rel="stylesheet" href="/var/www/html/Jay/Practice/Jquery/assets/bootstrap.css">    -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
            /*$.ajax({
                url:"getdata.php",
                method:"post",
                success:function(data){
                    $("#content").html(data);
                    $("#tda").DataTable({
                        "order": [[1,'asc']],
                        "pageLength": 50
                       
                       
                    })

                }
            });*/
            $("#tda").DataTable({
                "ajax":{
                    "url": "getdata.php",
                    "method":"post",
                    "dataSrc": "",
                   
               
                },
                
                columns: [
                  {"data":"id"},
                  {"data":"api"},
                  {"data":"description"},
                  {"data":"auth"},
                  {"data":"https"},
                  {"data":"cors"},
                  {"data":"link"},
                  {"data":"cat"},

                ],

                "order": [[1,'asc']],
                "pageLength": 50,
                       
                
            })
            console.log();
            
        });
    </script>
</html>