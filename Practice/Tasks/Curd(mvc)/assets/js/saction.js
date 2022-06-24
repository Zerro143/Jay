function student_data(){
    $.ajax({
        url:"../controller/crcontroller.php",
        method:"POST",
        dataType:"json",
        success:function(a){
            for (var i=0; i<a.length; i++) {
                var row = $('<tr><td>' + a[i].id+ '</td>'
                +'<td>'+ a[i].fname +'</td>'
                +'<td>'+ a[i].lname + '</td>'
                +'<td>'+ a[i].email + '</td>'
                +'<td>'+ a[i].m + '</td>'
                +'<td>'+ a[i].course + '</td>'
                +'<td>'+ a[i].created_date + '</td>'
                +'<td>'+ a[i].update_date + '</td>'
                +'<td><button id="edit" class="btn btn-info edit" did='+a[i].id+ ' dname ='+a[i].fname+'>Edit</button>'+ 
                ' <button id="Delete" class="btn btn-danger delete" did='+a[i].id+ ' dname='+a[i].fname+'> Delete</button></td></tr>');
                $('#student_content').append(row);
            }
        }
  
    });

}

var f = /^[a-zA-Z]*$/;
var k = /(6|7|8|9)\d{9}/;
var q = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

//var errcode = 0;

function validate(fname,lname,m,mail,bdate){
     errcode = 0 ;
     
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


$(document).ready(function(){
    student_data();
    $(".studentForm").hide();

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
                success:function(dataabc){ 
                    alert("Record Deleted from Database");
                    location.reload();
                }});
        }


    });

    $(".container").on("click","#studentAdd",function(e){
        e.preventDefault();
        $(".studentForm").show();
        $("#main").hide();
        $("#upd").hide();
        $.ajax({
            url:"../controller/crcontroller.php",
            method:"POST", 
            data:{a:'course'},
            dataType:"json",
            success:function(data){
                console.log(data);
                for (var i=0; i<data.length; i++) {
                    var row = $('<option value = '+data[i].course_id+'>'+data[i].course+'</option>');
                    $('#course1').append(row);
                }
            }
        });
    });

    $("#cls").click(function(e){
        e.preventDefault();
        $(".studentForm").hide();
        $("#main").show();
    })
    $("#add1").click(function(e){
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
                    
                    
                    if (a==0){
                        alert(fname + " Added to Database");
                        //
                        // location.reload();
                    }
                    else{
                        alert("Email already exist ")
                       
                    }
             
                                    
                    
                }});
            
            
        }

    });

});