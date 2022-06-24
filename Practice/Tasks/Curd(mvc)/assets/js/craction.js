
function data(){
    $.ajax({
        url:"../controller/crcontroller.php",
        method:"POST",
        data:{a:'course'},
        dataType:"json",
        success:function(a){
          
            for (var i=0; i<a.length; i++) {
                var row = $('<tr><td>' + a[i].course_id+ '</td><td>' 
                + a[i].course + 
                '</td><td><button id="edit" class="btn btn-info edit" did='+a[i].course_id+ ' dname ='+a[i].course+'>Edit</button>'+ 
                ' <button id="Delete" class="btn btn-danger delete" did='+a[i].course_id+ ' dname='+a[i].course+'> Delete</button></td></tr>');
                $('#course_content').append(row);
            }
        }
  
    });

}
$(document).ready(function(){
    $("#myForm").hide();
    
    const f = /^[a-zA-Z]*$/;
    const k = /(7|8|9)\d{9}/;
    $("#openForm").click(function(){
        $("#myForm").show();
        $("#update").hide();
        $("#add").show();
        $("#main").hide();
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
        $("#main").show();
    });

  data();

    $("#add").click(function(e){
        e.preventDefault();
       
        
        var btn = $("#add").attr("value");
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

        cid = $(this).attr("did");
        
        $("#expall").hide();
        $("#exp").hide();
        $("#delsel").hide();
        $("#add").hide();
        $("#main").hide();
        $("#update").show();
        $("#myForm").show();
        // $("#course").val(course);
         $.ajax({
    
            url:"../controller/crcontroller.php",
            method:"POST",
            data:{a:'edit_course',c:cid},
            dataType:"json",
            success:function(data){
               $("#course").val(data[0].course);
               $("#cid").val(data[0].course_id);
                
            }

        })

        
       
    });

    $("#update").click(function(e){
        e.preventDefault();
        var btn = "update_course";
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
