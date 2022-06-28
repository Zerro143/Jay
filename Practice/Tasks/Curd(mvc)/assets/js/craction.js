function del_sel(){
    var allVals = [];  
    $(".sil:checked").each(function(){
        allVals.push($(this).attr("value"));
    });
    //alert(allVals.length); 
    if(allVals.length == 0)  
    {  
        alert("Please select row.");  
    }else{
        if(confirm("Are you sure u want to delete")){
           var join_selected_values = allVals.join(","); 
           var btn= "del_course";
            $.ajax({   
                url:"../controller/crcontroller.php",
                type: "POST",  
                data: {c:allVals,a:btn},
                success: function(a)  
                {   
                    alert ("Selected data deleted");
                    location.reload();
                    // $("#datatable").load("students.php #datatable")                  
                }   
            });
        }else{
            $(".sil").prop('checked',false)
            $("#master").prop("checked", false);
        }

    }

}

function exp(){
    // e.preventDefault();
    var allVals = [];  
    $(".sil:checked").each(function(){
        allVals.push($(this).attr("value"));
    });
   
    if(allVals.length == 0)  
    {  
        alert("Please select row.");  
    }else{

           var join_selected_values = allVals.join(","); 
           var btn= "exp";
            $.ajax({   
              
                type: "POST",  
                url:"../controller/crcontroller.php",
                data: {ids:allVals,a:btn,c:'course'},
                success: function()  
                {   
                    //alert ("Selected data deleted");
                    
                    window.location.href='../export/output.csv';
                    $(".sil").prop('checked',false)
                    $("#master").prop('checked',false)
                }   
            });


    }

}
function da(a){
    // console.log(a[0]);
    // alert(a[0].length);
    $('#course_content').html("");
    var tp = a[1]['tt'];
    var page = parseInt(a[1]['page']);
    var sf = parseInt(a[1]['start_from'])
    var record = a[1]['record'];
    var tr = a[1]['tr'];
    $("#selector").val(record);
    $("#page").empty();
    $("#entries").empty();
    if(record>=tr){
        $("#entries").append(a[0].length+" Enteries")
    }
    else{
        $("#entries").append("Showing "+(sf+1)+" to "+(a[0].length + sf)+" of "+tr+" Enteries ")
    }
    
    if(page>=2){
        $("#page").append("<button class='btn' value="+(page-1)+"> Prev </button>")
    }
    for(var i=1;i<tp;i++){
        if(i==page){
            $("#page").append("<a class='btn active' value="+i+"> "+i+ "</button>")
        }
        else{
            if(i==(page-1)){
                $("#page").append("<a class = 'btn ' value ="+i+"> "+i+"</a>")
            }
            if(i==(page+1)){
                $("#page").append("<a class = 'btn ' value ="+i+"> "+i+" </a>")
            }
        }
    }

    if(page<tp){
        $("#page").append("<a class = 'btn' value ="+(page+1)+">Next</a>")
        
    }


    
    
    for (var i=0; i<a[0].length; i++) {
        var row = $('<tr>'+
        '<td><input type="checkbox" class="sil" id="checkbox" value=' + a[0][i].course_id+ '></td>'
        +'<td>' + a[0][i].course_id+ '</td>'+
        '<td>'+ a[0][i].course + '</td>'
        +'<td><button id="edit" class="btn btn-info edit" data-toggle="modal" data-target="#myModal" did='+a[0][i].course_id+ ' dname ='+a[0][i].course+'>Edit</button>'+ 
        ' <button id="Delete" class="btn btn-danger delete" did='+a[0][i].course_id+ ' dname='+a[0][i].course+'> Delete</button></td></tr>');
        $('#course_content').append(row);
        
    }
}


$(document).ready(function(){


    var val = $("#selector").val(); 
    $.ajax({
        url:"../controller/crcontroller.php",
        method:"POST",
        data:{a:'course',sel:val},
        dataType:"json",
        success:function(a){
            da(a);
        }
  
    });

    $("#page").on("click",".btn",function(e){
        e.preventDefault();
        var page = $(this).attr("value");
        var val = $("#selector").val();
        $.ajax({
            url:"../controller/crcontroller.php",
            method:"POST",
            data:{page:page,sel:val,a:'course'},
            dataType:"json",
            success:function(a){
                // alert(a);
                da(a);
            }
        });
    });

    $("#studentAdd").hide();
    $("#expall").hide();
    $("#main").on("click","#master",function(){
        if($("#master").is(':checked',true)){
            $(".sil").prop('checked',true)
        }
        else{
            $(".sil").prop('checked',false)
        }
        
    })
    $("#main").on("click",".sil",function(){
    
        if($(".sil").length == $(".sil:checked").length) {
            $("#master").prop("checked", true);
        } else {
            $("#master").prop("checked", false);
        }
    })

    $("#selector_action").on("click",function(e){
        e.preventDefault();
       
        var val= $(this).val();
        // alert(val);
        // var allVals = []; 
        switch (val){
            case 'exp':
                // alert(val);
                exp();
                break;
            case 'delsel':
                // alert(val);
                del_sel();
                break; 
        }

  
    });


    $("#selector").change(function(e){
        e.preventDefault();
        var val = $(this).val();
        $.ajax({
            url:"../controller/crcontroller.php",
            method:"POST",
            dataType:"json",
            data:{sel:val,a:'course'},
            success:function(a){
                da(a);
            }
        })
    });

    
    const f = /^[a-zA-Z]*$/;
    const k = /(7|8|9)\d{9}/;
    $("#openForm").click(function(){
        $("#update").hide();
        $("#add").show();
        $("#cid").val("");
        $("#course").val("");
        $("#crerr").html("");
    });




    $("#add").click(function(e){
        e.preventDefault();
       
        
        var btn = 'add_course';
        var course = $("#course").val();
        
        //alert(course + "Added to Database")
        if(course !== ""){
            if(f.test(course) == true){

                $.ajax({
                    url:"../controller/crcontroller.php", 
                    method:"POST", 
                    data:{a:btn,b:course}, 
                    success:function(a){ 
                        if (a==0){
                            // alert(course + " Added to Database");

                            location.reload();
                        }
                        else{
                            $("#crerr").html("<b>Course already exist</b>");
                           
                        }
                    
                    }});

            }
            else{
                $("#crerr").html("<b>Only Alphabets are allowed</b>")
            }

        }else{
            //alert("Please enter the Course");
            $("#crerr").html("<b>Please Enter the Course</b>")
        }
    
    });

    $("#course_content").on("click",".delete",function(e){
        
        e.preventDefault();
        
        var cid = $(this).attr("did");
        var course = $(this).attr("dname");
        var btn = "del_course";
          
        if(confirm("Are you sure u want to delete " + course)){
            
            $.ajax({
                url:"../controller/crcontroller.php",
                    method:"POST", 
                    data:{a:btn,c:cid}, 
                    success:function(dataabc){ 
                        //$("#main").load("index.php #dta");
                        alert(course + " Deleted from Database");
                        location.reload();
                    }});
        }


    });
    
    $("#course_content").on("click",".edit",function(e){
        e.preventDefault();

        var cid = $(this).attr("did");

        $("#add").hide();
        $("#update").show();
        $("#cid").val(cid);
        
         $.ajax({
    
            url:"../controller/crcontroller.php",
            method:"POST",
            data:{a:'edit_course',c:cid},
            dataType:"json",
            success:function(data){
               $("#course").val(data[0][0].course);
               $("#cid").val(data[0][0].course_id);
                
            }

        })

        
       
    });

    $("#update").click(function(e){
        e.preventDefault();
        var btn = "update_course";
        var cid = $("#cid").val();
        var course = $("#course").val()
        if(course !== ""){
            if(f.test(course) == true){
                $.ajax({
                    url:"../controller/crcontroller.php",
                    method:"POST", 
                    data:{a:btn,b:course,c:cid}, 
                    success:function(){ 
                        location.reload();
                        $("#myForm").hide();
                        alert(course + " Updated in Database");
                        $("#course").val("");
                        $("#did").val("");
                        $("#crerr").html("");
                    }});
            }
            else{
                $("#crerr").html("<b>Only Alphabets are allowed</b>")
            }
        }else{
            
            $("#crerr").html("<b>Please Enter the Course</b>")
        }

    });
            

    
});  
