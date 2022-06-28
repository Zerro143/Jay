function da(a){
    $("#openForm").hide();
    // $(".studentForm").hide();
    $("#expall").hide();
    $('#student_content').empty();
    var tp = a[1]['tt'];
    var page = parseInt(a[1]['page']);
    var sf = parseInt(a[1]['start_from'])
    var record = a[1]['record'];
    var tr = a[1]['tr'];
    $("#selector").val(record);
    $('#student_content').empty();
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


    var a = a[0];
    for (var i=0; i<a.length; i++) {
        var row = $('<tr>'
        +'<td><input type="checkbox" class="sil" id="checkbox" value='+a[i].id+'></td>'
        +'<td>' + a[i].id+ '</td>'
        +'<td>'+ a[i].fname +'</td>'
        +'<td>'+ a[i].lname + '</td>'
        +'<td>'+ a[i].email + '</td>'
        +'<td>'+ a[i].m + '</td>'
        +'<td>'+ a[i].course + '</td>'
        +'<td>'+ a[i].bdate + '</td>'
        +'<td>'+ a[i].created_date + '</td>'
        +'<td>'+ a[i].update_date + '</td>'
        +'<td><button id="edit" class="btn btn-info edit" data-toggle="modal" data-target="#md" did='+a[i].id+ ' dname ='+a[i].fname+'>Edit</button>'+ 
        ' <button id="Delete" class="btn btn-danger delete" did='+a[i].id+ ' dname='+a[i].fname+'> Delete</button></td></tr>');
        $('#student_content').append(row);
    }
}
function std(){
    var val = $("#selector").val(); 
    $("#success-alert").hide();
    $("#danger-alert").hide();
    $.ajax({
        url:"../controller/crcontroller.php",
        method:"POST",
        data:{a:'student',sel:val},
        dataType:"json",
        success:function(a){
            da(a);
        }
  
    });

}







//var errcode = 0;

function validate(fname,lname,m,mail,bdate){
     errcode = 0 ;
     var f = /^[a-zA-Z]*$/;
     var k = /(6|7|8|9)\d{9}/;
     var q = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
     var dtCurrent = new Date();
     var dtdob = new Date(bdate);
     var aa = (dtCurrent.getFullYear() - dtdob.getFullYear())
     
     

     
     if(fname == ""){
         $("#fname").focus();
         $("#ferr").html("<b>Please Enter you name</b>");
         //alert("enter name");
         errcode = 1;
            
     } else{
         //console.log("1")
         $("#ferr").html("");
         //$("#ferr").hide();
         

     }
     if (f.test(fname) == false){
         $("#fname").focus();
         //alert("Only char ");
         $("#ferr").html("<b>Only Alphabets are allowed</b>");
         errcode = 1;
     } 
                                                                                                                                                                                                        
                                                                                                                                                                                                        
     if(lname == ""){
         $("#lname").focus();
         $("#lerr").html("<b>Please Enter your Last name</b>");
         //alert("enter lname");
         errcode = 1;
         
     }
     else{
         $("#lerr").html("");
     }
     if (f.test(lname) == false){
         $("#lname").focus();
         //alert("Only char ");
         $("#lerr").html("<b>Only Alphabets are allowed</b>");
         errcode = 1;
     }
     
    
     //if(m !== ""){
     if(k.test(m) == false){
         $("#m").focus();
         //alert("Invalid Phone Number");
         $("#merr").html("<b>Only 10 digits are allowed</b>");
         errcode = 1;
 
     }
     else{
         $("#merr").html("");
     }
   

     if (q.test(mail) == false){
         $("#mailerr").html("<b> Please enter a valid email id");
         errcode = 1;

     }
     else{
         $("#mailerr").html("");
     }
     if(bdate == ""){
        $("#bderr").html("<b> Please select the valid date");
        
        errocode = 1;

       
     }else{
         
    if (aa < 10) {
        errcode = 1;

        $("#bderr").html("<b> Only for age 10 and above");
    }else{
        $("#bderr").html("");
    }
    }

    return errcode

    
}
function exp(){
   
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
                data: {ids:allVals,a:btn,c:'student'},
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
           var btn= "del_std";
            $.ajax({   
                url:"../controller/crcontroller.php",
                type: "POST",  
                data: {c:allVals,a:btn},
                success: function(a)  
                {   
                    std();
                    $("#dsa").html("<b> Data Deleted from database");
               
                    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#danger-alert").slideUp(500);
                       
                    });
                    // std();
                    // alert ("Selected data deleted");
                    // location.reload();
                    // $("#datatable").load("students.php #datatable")                  
                }   
            });
        }else{
            $(".sil").prop('checked',false)
            $("#master").prop("checked", false);
        }

    }

}


$(document).ready(function(){
std();
 
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#student_content tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    $("#selector").change(function(e){
        e.preventDefault();
        var val = $(this).val();
        std();

    });
    $("#page").on("click",".btn",function(e){
        e.preventDefault();
        var page = $(this).attr("value");
        var val = $("#selector").val();
        $.ajax({
            url:"../controller/crcontroller.php",
            method:"POST",
            data:{page:page,sel:val,a:'student'},
            dataType:"json",
            success:function(a){
                // alert(a);
                da(a);
            }
        });
    });


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
    
    $("#student_content").on("click",".delete",function(e){
            
        e.preventDefault();
        
        var cid = $(this).attr("did");
        // var course = $(this).attr("dname");
        var btn = "del_std";
        
        if(confirm("Are you sure u want to delete this record" )){
            
            $.ajax({
                url:"../controller/crcontroller.php",
                method:"POST", 
                data:{a:btn,c:cid}, 
                success:function(){ 
                    std();
                    $("#dsa").html("<b> Data Deleted from database");
               
                    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#danger-alert").slideUp(500);
                       
                    });
                }});
        }


    });

    $("#student_content").on("click",".edit",function(e){
        e.preventDefault();

        var cid = $(this).attr("did");

        
        // $('#md').modal('show');
        $("#add1").hide();

        $("#upd").show();
        $("#did").val(cid);
         $.ajax({
    
            url:"../controller/crcontroller.php",
            method:"POST",
            data:{a:'edit_std',c:cid},
            dataType:"json",
            success:function(data){
                // $("#did").val(data[0].id);
                $("#fname").val(data[0][0].fname);
                $("#lname").val(data[0][0].lname);
                $("#bdate").val(data[0][0].bdate);
                $("#m").val(data[0][0].m);
                $("#mail").val(data[0][0].email);

                var dt = data[1][0];
                for (var i=0; i<dt.length; i++) {
                    var row = $('<option value = '+dt[i].course_id+'>'+dt[i].course+'</option>');
                    $('#course1').append(row);
                }
                
            }

        })

        
       
    });

    $("#btn").on("click","#studentAdd",function(e){
        e.preventDefault();
        // $(".studentForm").show();
        $("#add1").show();
        // $("#main").hide();
        $("#ferr").html("");
        $("#lerr").html("");
        $("#merr").html("");
        $("#bderr").html("");
        $("#mailerr").html("");
        $("#upd").hide();
        $("#did").val("");
        $("#fname").val("");
        $("#lname").val("");
        $("#bdate").val("");
        $("#m").val("");
        $("#mail").val("");
        $.ajax({
            url:"../controller/crcontroller.php",
            method:"POST", 
            data:{a:'course'},
            dataType:"json",
            success:function(data){
                console.log(data);
                for (var i=0; i<data[0].length; i++) {
                    var row = $('<option value = '+data[0][i].course_id+'>'+data[0][i].course+'</option>');
                    $('#course1').append(row);
                }
            }
        });
    });



    $("#upd").on("click",function(e){
        e.preventDefault();

        var today = new Date();
        var y = String(today.getFullYear());
        var mm = String(1 + today.getMonth()).padStart(2, '0');
        var d = String(1 + today.getDay()).padStart(2, '0');

      
        
        var btn = "update_std";
        var id = $("#did").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var bdate = $("#bdate").val();
        var m = $("#m").val();
        var mail = $("#mail").val();
        var course = $("#course1").val();
        var cdate = y +"-"+ mm +"-"+ d; //$("#cdate").val();
    
        errcode = validate(fname,lname,m,mail,bdate);
        
        if(errcode == 0){
           
            $.ajax({
                url:"../controller/crcontroller.php",
                method:"POST", 
                data:{a:btn,b:fname,c:lname,d:bdate,e:m,f:mail,g:course,h:cdate,i:id}, 
                success:function(){ 
                    $("#mdcl").click();
                    std();
                    $("#ssa").html("<b>"+fname+" Updated in database");
                    $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#success-alert").slideUp(500);
                       
                    });
                    // alert("Data has been Updated to Database");
                    // $('#myModal').modal('hide');
                    // location.reload();
                    // $("#upd").hide();

                                    
                    
                }});
            
            
        }
    });


    $("#md").on("click","#add1",function(e){
     
        e.preventDefault();

        var today = new Date();
        var y = String(today.getFullYear());
        var mm = String(1 + today.getMonth()).padStart(2, '0');
        var d = String(1 + today.getDay()).padStart(2, '0');

              
       
   
        
      
      var btn = $("#add1").attr("value");
      var fname = $("#fname").val();
      var lname = $("#lname").val();
      var bdate = $("#bdate").val();
      var m = $("#m").val();
      var mail = $("#mail").val();
      var course = $("#course1").val();
      var cdate = y +"-"+ mm +"-"+ d; //$("#cdate").val();
     
       
      

       errcode = validate(fname,lname,m,mail,bdate);
       

      
      
        if(errcode == 0){
           
            $.ajax({
                url:"../controller/crcontroller.php", 
                method:"POST", 
                data:{a:'addstd',b:fname,c:lname,d:bdate,e:m,f:mail,g:course,h:cdate}, 
                success:function(a){ 
                    
                    // location.reload();
                    if (a==0){
                    
                        std();
                        $("#mdcl").click();
                        
                        $("#ssa").html("<b>"+fname+" Added to database");
                        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                            $("#success-alert").slideUp(500);
                           
                        });
                        // alert(fname + " Added to Database");
                    }
                    else{
                        $("#mailerr").html("<b> Email already exist ");
                        // alert("Email already exist ");
                       
                    }
             
                                    
        
                }
            });
            
            
        }

    });

});