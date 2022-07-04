<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


<input type='hidden' id='current_page' />
    <input type='hidden' id='show_per_page' />
<table class="table" id="tblData">
                <thead>
                  <tr>
                    <!-- <th><input type="checkbox" name="" id="master"></th> -->
                    <th id="cr_id" dt="course_id" order="">Course ID</th>
                    <th id="cr_name" dt="course"order="">Course Name</th>
                  </tr>
                </thead>
                <tbody id="jar">

                </tbody>
            </table>
<div class="pagination">
</div>
<div id='page_navigation'>
    </div>
<script>
    function da(){
        $.ajax({
        url:"Curd(mvc)/controller/crcontroller.php",
        method:"POST",
        data:{a:'course'},
        dataType:"json",
       
        success:function(a){
            // $("body").html(a);
            if(a['status']=='Error'){
                $("body").html("<center><h1>"+a['msg']+"</h1>");
            }else{

                var data = a['data'];
                // cr(data);
                for (var i=0; i<data[0].length; i++) {
                    var row = $('<tr>'
                        // '<td><input type="checkbox" class="sil" id="checkbox" value=' + data[0][i].course_id+ '></td>'
                       +'<td>' + data[0][i].course_id+ '</td>'+
                        '<td>'+ data[0][i].course + '</td></tr>');
                         $('#jar').append(row);   
                }

            }
        }
    });
    }

    da();

</script>