// function sortTable(n) {
//     var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
//     table = document.getElementById("tda");
//     switching = true;
//     //Set the sorting direction to ascending:
//     dir = "asc";
//     /*Make a loop that will continue until
//     no switching has been done:*/
//     while (switching) {
//         //start by saying: no switching is done:
//         switching = false;
//         rows = table.rows;
//         /*Loop through all table rows (except the
//         first, which contains table headers):*/
//         for (i = 1; i < (rows.length - 1); i++) {
//             //start by saying there should be no switching:
//             shouldSwitch = false;
//             /*Get the two elements you want to compare,
//             one from current row and one from the next:*/
//             x = rows[i].getElementsByTagName("td")[n];
//             y = rows[i + 1].getElementsByTagName("td")[n];
//             /*check if the two rows should switch place,
//             based on the direction, asc or desc:*/
//             if (dir == "asc") {
//                 if (x.innerHTML.match(/^-?\d+$/) && y.innerHTML.match(/^-?\d+$/)) {
//                     if (Number(x.innerHTML) > Number(y.innerHTML)) {
//                         //if so, mark as a switch and break the loop:
//                         shouldSwitch = true;
//                         break;
//                     }
//                 } else if (x.innerHTML.match(/^\d+\.\d+$/) && y.innerHTML.match(/^\d+\.\d+$/)) {
//                     if (Number(x.innerHTML) > Number(y.innerHTML)) {
//                         //if so, mark as a switch and break the loop:
//                         shouldSwitch = true;
//                         break;
//                     }
//                 } else {
//                     if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
//                         //if so, mark as a switch and break the loop:
//                         shouldSwitch = true;
//                         break;
//                     }
//                 }
//             } else if (dir == "desc") {
//                 if (x.innerHTML.match(/^-?\d+$/) && y.innerHTML.match(/^-?\d+$/)) {
//                     if (Number(x.innerHTML) < Number(y.innerHTML)) {
//                         //if so, mark as a switch and break the loop:
//                         shouldSwitch = true;
//                         break;
//                     }
//                 } else if (x.innerHTML.match(/^\d+\.\d+$/) && y.innerHTML.match(/^\d+\.\d+$/)) {
//                     if (Number(x.innerHTML) < Number(y.innerHTML)) {
//                         //if so, mark as a switch and break the loop:
//                         shouldSwitch = true;
//                         break;
//                     }
//                 } else {
//                     if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
//                         //if so, mark as a switch and break the loop:
//                         shouldSwitch = true;
//                         break;
//                     }
//                 }
//             }
//         }
//         if (shouldSwitch) {
//             /*If a switch has been marked, make the switch
//             and mark that a switch has been done:*/
//             rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
//             switching = true;
//             //Each time a switch is done, increase this count by 1:
//             switchcount++;
//         } else {
//             /*If no switching has been done AND the direction is "asc",
//             set the direction to "desc" and run the while loop again.*/
//             if (switchcount == 0 && dir == "asc") {
//                 dir = "desc";
//                 switching = true;
//             }
//         }
//     }
// }



function del_sel(){
    var allVals = [];  
    $(".sil:checked").each(function(){
        allVals.push($(this).attr("value"));
    });
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
                    da();
                    $("#dsa").html("<b> Data Deleted from database");
               
                    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#danger-alert").slideUp(500);
                       
                    });             
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
        var l ='../export/output.csv';
        var join_selected_values = allVals.join(","); 
        var btn= "exp";
         $.ajax({   
           
            type: "POST",  
            url:"../controller/crcontroller.php",
            data: {ids:allVals,a:btn,c:'course'},
            success: function(a)  
            {                    
                 
                var a = $("<a />");
                a.attr("download", "output");
                a.attr("href",l);
                $("body").append(a);
                a[0].click();
                $("body").remove(a);

            }   
        });
    }
}

function cr(a){
    $("#master").prop('checked',false)
    $('#course_content').empty();
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

function da(){
    var val = $("#selector").val(); 
    $("#expall").hide();
    $("#studentAdd").hide();
    $("#success-alert").hide();
    $("#danger-alert").hide();
    // $('#preloader').removeClass('hidden')
    var page = $("#page").attr("value");
    $("#preloader").fadeIn();
    $.ajax({
        url:"../controller/crcontroller.php",
        method:"POST",
        data:{a:'course',sel:val},
        dataType:"json",
       
        success:function(a){
            // $("body").html(a);
            if(a['status']=='Error'){
                $("body").html("<center><h1>"+a['msg']+"</h1>");
            }else{

                var data = a['data'];
                cr(data);

            }

            $("#preloader").fadeOut(3000,function(){
                $(this).addClass('hidden')
            });
      

        }
    });
}

$(document).ready(function(){

    // $("#cr_id").on("click",function(e){
    //     e.preventDefault();
        
    //     var val = $("#selector").val(); 
        
    //     $.ajax({
    //         url:"../controller/crcontroller.php",
    //         method:"POST",
    //         data:{page:page,sel:val,a:'course'},
    //         dataType:"json",
           
    //         success:function(a){
    //             // $("body").html(a);
    //             if(a['status']=='Error'){
    //                 $("body").html("<center><h1>"+a['msg']+"</h1>");
    //             }else{
    
    //                 var data = a['data'];
    //                 const  sorter = (a,b) => {
    //                     return a.course_id - b.course_id;
    //                 }
    //                 if ($("#cr_id").is('.asc')){
    //                     $("#cr_id").removeClass('asc');
    //                     $("#cr_id").addClass('desc selected');
    //                     var sortbyid = arr =>{
    //                         arr.sort(sorter);
    //                         arr.reverse();
    //                     }
    //                 }
    //                 else{
    //                     $("#cr_id").addClass('asc selected');
    //                     $("#cr_id").removeClass('desc');
    //                     var sortbyid = arr =>{
    //                         arr.sort(sorter);
    //                         // arr.reverse();
    //                     }
    //                 }
    
                   
    //                sortbyid(data[0]);
                    
                    
    //                 cr(data);
    
    //             }
    
    //             // $("#preloader").fadeOut(3000,function(){
    //             //     $(this).addClass('hidden')
    //             // });
          
    
    //         }
    //     });

    // });
    // $("#cr_name").on("click",function(e){
    //     e.preventDefault();
    //     var val = $("#selector").val();
    //     var page = $("#page").attr("value"); 
    //     $.ajax({
    //         url:"../controller/crcontroller.php",
    //         method:"POST",
    //         data:{page:page,sel:val,a:'course'},
    //         dataType:"json",
           
    //         success:function(a){
    //             // $("body").html(a);
    //             if(a['status']=='Error'){
    //                 $("body").html("<center><h1>"+a['msg']+"</h1>");
    //             }else{
    
    //                 var data = a['data'];
    //                 const  sorter = (a,b) => {
    //                     return a.course - b.course;
    //                 }
    //                 if ($("#cr_name").is('.asc')){
    //                     $("#cr_name").removeClass('asc');
    //                     $("#cr_name").addClass('desc selected');
    //                     var sortbyid = arr =>{
    //                         arr.sort(sorter);
    //                         arr.reverse();
    //                     }
    //                 }
    //                 else{
    //                     $("#cr_name").addClass('asc selected');
    //                     $("#cr_name").removeClass('desc');
    //                     var sortbyid = arr =>{
    //                         arr.sort(sorter);
    //                         // arr.reverse();
    //                     }
    //                 }
    
                   
    //                sortbyid(data[0]);
                    
                    
    //                 cr(data);
    
    //             }
    
    //             // $("#preloader").fadeOut(3000,function(){
    //             //     $(this).addClass('hidden')
    //             // });
          
    
    //         }
    //     });
    // });

    

    $("#mdload").hide();
    da();

    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#course_content tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
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
                if(a['status']=='Error'){
                    $("body").html("<center><h1>"+a['msg']+"</h1>");
                }else{
    
                    var data = a['data'];
                    cr(data);
    
                }
            }
        });
    });


    $("#main").on("click","#master",function(){
        if($("#master").is(':checked',true)){
            $(".sil").prop('checked',true)
        }
        else{
            $(".sil").prop('checked',false)
        }
        
    })
    // $("#main").on("click",".sil",function(){
    
        if($(".sil").length == $(".sil:checked").length) {
            $("#master").prop("checked", true);
        } else {
            $("#master").prop("checked", false);
        }
    // })

    $("#selector_action").on("click",function(e){
        e.preventDefault();
       
        var val= $(this).val();
        if(val == 'delsel'){
            del_sel();
        }else if(val =='exp'){
            exp();
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

    $("#myModal").on("click","#add",function(e){
        // alert();
        e.preventDefault();

        var btn = 'add_course';
        var course = $("#course").val();
        
        //alert(course + "Added to Database")
        if(course !== ""){
            if(f.test(course) == true){
                $('#preloader').removeClass('hidden')
                $.ajax({
                    url:"../controller/crcontroller.php", 
                    method:"POST", 
                    dataType:"json",
                    data:{a:btn,b:course},
                    success:function(a){ 
                        
                        if (a['status']=='Success'){
                            // alert('2');
                            da();                            
                            $('#myModal').modal('hide');
                            
                            $("#ssa").html(a['msg']);
                            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                                $("#success-alert").slideUp(500);
                               
                            });
                            $("#preloader").fadeOut(3000,function(){
                                $(this).addClass('hidden')
                             });
                        }else if(a['status']=='Error'){
                            $("#crerr").html(a['msg']);
                            // alert('1');
                            // alert(a['msg']);
                        }
                    } 
                });
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
                dataType:"json",
                success:function(){ 
                    
                    $("#dsa").html("<b>"+course+" Deleted from database");
                    da();
                    $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#danger-alert").slideUp(500);
                       
                    });  
                }
            });
        }
    });
    
    $("#course_content").on("click",".edit",function(e){
        e.preventDefault();

        var cid = $(this).attr("did");
        $("#crerr").empty();  
        $("#add").hide();
        $("#update").show();
        $("#cid").val(cid);
        $("#mdata").hide();
        $("#mdload").fadeIn();
        
         $.ajax({
    
            url:"../controller/crcontroller.php",
            method:"POST",
            data:{a:'edit_course',c:cid},
            dataType:"json",

            success:function(data){
            
               $("#course").val(data[0][0].course);
               $("#cid").val(data[0][0].course_id);
                
               $("#mdload").fadeOut(3000);
               $("#mdata").show();   
                
            }
        });
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
                        da();                            
                        $('#myModal').modal('hide');
                        $("#ssa").html("<b>"+course+" updated in database");
                        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                            $("#success-alert").slideUp(500);
                           
                        });
                    }
                });
            }
            else{
                $("#crerr").html("<b>Only Alphabets are allowed</b>")
            }
        }else{
            
            $("#crerr").html("<b>Please Enter the Course</b>")
        }

    });
});