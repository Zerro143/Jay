
$(document).ready(function(){
    $("#myForm").hide();
    const f = /^[a-zA-Z]*$/;
    const k = /(7|8|9)\d{9}/;

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

    $("#add").click(function(e){
        e.preventDefault();
       
        
        var btn = $("#add").attr("value");
        var course = $("#course").val();
        
        //alert(course + "Added to Database")
        if(course !== ""){
            if(f.test(course) == true){
                alert("data is correct");
            }
                
        //         $.ajax({url:"upcr.php", 
        //         method:"POST", 
        //         data:{a:btn,b:course}, 
        //         success:function(a){ 
        //             if (a==0){
        //                 alert(course + " Added to Database");
                        
        //                 location.reload();
        //             }
        //             else{
        //                 alert("Course already exist")
                       
        //             }
             
        //         }});

                // }
             else{
                 $("#crerr").html("<b>Only Alphabets are allowed</b>")
                 }

            }else{
        //     //alert("Please enter the Course");
             $("#crerr").html("<b>Please Enter the Course</b>")
         }
    });
});  
