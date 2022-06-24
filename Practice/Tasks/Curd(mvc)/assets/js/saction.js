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

});