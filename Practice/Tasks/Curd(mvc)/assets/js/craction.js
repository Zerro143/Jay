$("#myForm").hide();

$(document).ready(function(){
   
    const f = /^[a-zA-Z]*$/;
    const k = /(7|8|9)\d{9}/;
    $(".datatable").show();
    

    $("#openForm").click(function(){
        $("#myForm").show();
        $("#update").hide();
        $("#add").show();
        $(".datatable").hide();
        $("#expall").hide();
        $("#exp").hide();
        $("#delsel").hide();
        $("#course").val("");
        $("#crerr").html("");
        $(".studentForm").hide();
    });
    $("#closeForm").click(function(){
        $("#myForm").hide();
        $("#crerr").html("");
        $("#expall").show();
        $("#exp").show();
        $("#delsel").show();
        $(".datatable").show();
    });

    $(".edit").click(function(){
        $("#expall").hide();
        $("#exp").hide();
        $("#delsel").hide();
        var cid = $(this).attr("did");
        var course = $(this).attr("dname");
             
        $("#add").hide();
        $(".datatable").hide();
        $("#update").show();
        $("#myForm").show();
        $("#course").val(course);
        $("#update").click(function(e){
            e.preventDefault();
            var btn = $("#update").val();
            var course = $("#course").val()
            if(course !== ""){
                if(f.test(course) == true){
                    $.ajax({url:"upcr.php", 
                    method:"POST", 
                    data:{a:btn,b:course,c:cid}, 
                    success:function(){ 
                        location.reload();
                        $("#myForm").hide();
                        alert(course + "Updated in Database");
                        $("#course").val("");
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
    
    $("#add").click(function(e){
        e.preventDefault();
       
        
        var btn = $("#add").attr("value");
        var course = $("#course").val();
        
        //alert(course + "Added to Database")
        if(course !== ""){
            if(f.test(course) == true){
                $.ajax({url:"upcr.php", 
                method:"POST", 
                data:{a:btn,b:course}, 
                success:function(a){ 
                    if (a==0){
                        alert(course + " Added to Database");
                        
                        location.reload();
                    }
                    else{
                        alert("Course already exist")
                       
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

    $(".delete").click(function(e){
        e.preventDefault();
        
        var cid = $(this).attr("did");
        var course = $(this).attr("dname");
        var btn = "del";
          
        if(confirm("Are you sure u want to delete" + course)){
            
            $.ajax({url:"upcr.php", 
            method:"POST", 
            data:{a:btn,c:cid}, 
            success:function(dataabc){ 
                $("#datatable").load("course .php #datatable")
                alert(course + " Deleted from Database");
                
            }});
        }


    });

});