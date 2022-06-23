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
                $('#content').append(row);
            }
        }
  
    });

}

$(document).ready(function(){
student_data();
});