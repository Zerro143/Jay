<html>
    <head></head>
    <body>
        <div class="container" >
               
            <br>    
            
            <button class="btn-xs btn-primary" onclick="location.href='student.php' ">Show All Students Record</button>
            <button class="btn-xs btn-primary" onclick="location.href='course.php'">Show All course Record</button>
            <button class="btn-xs btn-primary" data-toggle="modal" data-target="#myModal" id="studentAdd">Add Student Record</button>
            <button class="btn-xs btn-primary" data-toggle="modal" data-target="#myModal"id="openForm">Add Course</button>
            <br>
            <br>
            <select class="selector" id="selector_action">
                    <option id="delsel" value='delsel'>Delete Selected</option>
                    <option id="exp" value='exp'>Export Selected</option>
                    <!-- <option value='25'>25</option> -->
            </select>
            <!-- <button class="btn-xs btn-primary" id="delsel">Delete Selected</button>
            <button class="btn-xs btn-primary" id="exp">Export Selected</button> -->
            <!-- <button class="btn-xs btn-primary" id="expall">Export</button> -->
            <br>
                
        </div> 
    </body>
</html>