//$("#myForm").hide();


$(".studentForm").hide();
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

$(document).ready(function(){
    
 
   
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
     

         //}
         
       
         

         return errcode

        
    }


    $("#studentAdd").click(function(e){
        e.preventDefault();
        $("#upd").hide();
        $(".studentForm").show();
        $(".datatable").hide();
        $("#add1").show();
        $("#myForm").hide();
        $("#expall").hide();
        $("#exp").hide();
        $("#delsel").hide();
        
        $("#did").val("");
        $("#fname").val("");
        $("#lname").val("");
        $("#bdate").val("");
        $("#m").val("");
        $("#mail").val("");
        $("#course1").val("");
    });


    $("#main").on("click",".edit1",function(e){
        e.preventDefault();
        $(".studentForm").show();
        $(".datatable").hide();
        $("#upd").show();
        $("#add1").hide();
        $("#expall").hide();
        $("#exp").hide();
        $("#delsel").hide();
        
      
        var did = $(this).attr("did");
        var dfname = $(this).attr("dfname");
        var dlname = $(this).attr("dlname");
        var dbdate = $(this).attr("dbdate");
        var dm = $(this).attr("dm");
        var dmail = $(this).attr("dmail");
        var dcourse = $(this).attr("dcourse");

        var id = $("#did").val(did);
        var fname = $("#fname").val(dfname);
        var lname = $("#lname").val(dlname);
        var bdate = $("#bdate").val(dbdate);
        var m = $("#m").val(dm);
        var mail = $("#mail").val(dmail);
        var course = $("#course1").val(dcourse);
        var cdate = y +"-"+ mm +"-"+ d; 
    
        

      
       
    });
    $("#upd").click(function(e){
        e.preventDefault();

        var today = new Date();
        var y = String(today.getFullYear());
        var mm = String(1 + today.getMonth()).padStart(2, '0');
        var d = String(1 + today.getDay()).padStart(2, '0');

        
        
        var btn = $("#upd").attr("value");
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
           
            $.ajax({url:"ups.php", 
                method:"POST", 
                data:{a:btn,b:fname,c:lname,d:bdate,e:m,f:mail,g:course,h:cdate,i:id}, 
                success:function(dataabc){ 
                    alert(" Date has been Updated to Database");
                    location.reload();
                    $("#upd").hide();
                                    
                    
                }});
            
            
            }
    });




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
           
            $.ajax({url:"ups.php", 
                method:"POST", 
                data:{a:btn,b:fname,c:lname,d:bdate,e:m,f:mail,g:course,h:cdate}, 
                success:function(a){ 
                    
                    
                    if (a==0){
                        alert(fname + " Added to Database");
                        //
                        location.reload();
                    }
                    else{
                        alert("Email already exist ")
                       
                    }
             
                                    
                    
                }});
            
            
        }

    });
    
    $("#delsel").click(function(){
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
               var btn= "del";
                $.ajax({   
				  
					type: "POST",  
					url: "ups.php",  
					data: {ids:allVals,a:btn},
					success: function()  
					{   
                        //alert ("Selected data deleted");
                        //location.reload();
                        $("#datatable").load("students.php #datatable")                  
					}   
				});
            }else{
                $(".sil").prop('checked',false)
                $("#master").prop("checked", false);
            }

        }

    });
    $("#exp").click(function(e){
        e.preventDefault();
        var allVals = [];  
        $(".sil:checked").each(function(){
            allVals.push($(this).attr("value"));
        });
        //alert(allVals.length); 
        if(allVals.length == 0)  
        {  
            alert("Please select row.");  
        }else{

               var join_selected_values = allVals.join(","); 
               var btn= "exp";
                $.ajax({   
				  
					type: "POST",  
					url: "ups.php",  
					data: {ids:allVals,a:btn},
					success: function()  
					{   
                        //alert ("Selected data deleted");
                        
                        window.location.href='output.csv';
                        $(".sil").prop('checked',false)
                        $("#master").prop('checked',false)
					}   
				});


        }

    });
    $("#expall").click(function(e){
        e.preventDefault();



        
        var btn= "expall";
        $.ajax({   
		  
			type: "POST",  
			url: "ups.php",  
			data: {a:btn},
			success: function()  
			{   
                //alert ("Selected data deleted");
             
                window.location.href='output.csv';
                $(".sil").prop('checked',false)
                $("#master").prop('checked',false)
			}   
    	});




    });

    

 
   
      
   
    $("#cls").click(function(){
        $(".studentForm").hide();
        $("#crerr").html("");
        $(".datatable").show();
        $("#expall").show();
        $("#exp").show();
        $("#delsel").show();

        
        var id = $("#did").val("");
        var fname = $("#fname").val("");
        var lname = $("#lname").val("");
        var bdate = $("#bdate").val("");
        var m = $("#m").val("");
        var mail = $("#mail").val("");
        var course = $("#course1").val("");
        
    });

    $("#main").on("click",".delete1",function(){
        
        
        var id = $(this).attr("did");
        //var course = $(this).attr("dname");
        var btn = "del";
          
        if(confirm("Are you sure u want to delete")){
            
            $.ajax({url:"ups.php", 
            method:"POST", 
            data:{a:btn,c:id}, 
            success:function(dataabc){ 
                //location.reload();
                $("#main").load("students.php #datatable")     
                //alert("Record Deleted from Database");
                
            }});
        }


    });
    $('#upload_csv_form').on("submit", function(e){  
        e.preventDefault(); 
        $.ajax({  
             url:"csvst.php",  
             method:"POST",  
             data:new FormData(this),  
             contentType:false,          // The content type used when sending data to the server.  
             cache:false,                // To unable request pages to be cached  
             processData:false,          // To send DOMDocument or non processed data file it is set to false  
             success: function(data){  
                  if(data=='Error1')  
                  {  
                       alert("Invalid File");  
                  }  
                  else if(data == "Error2")  
                  {  
                       alert("Please Select File");  
                  }                           
                  else if(data == "Success")  
                  {  
                       alert("CSV file data has been imported");  
                       $('#upload_csv_form')[0].reset();
                       location.reload();
                  }  
                  else  
                  {  
                      // $('#employee_table').html(data);  
                  }  
             }  
        })  
   });  
   
    
});