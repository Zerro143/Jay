<html>
    <style>
        #sr{
            float: right;
        }
    </style>
    <head></head>
    <body>
        <div class="container" >
               
            <br>    
            
            <!-- <button class="btn-xs btn-primary" onclick="location.href='student.php' ">Show All Students Record</button>
            <button class="btn-xs btn-primary" onclick="location.href='course.php'">Show All course Record</button> -->
            <button class="btn-xs btn-primary" data-toggle="modal" data-target="#md" id="studentAdd">Add Student Record</button>
            <button class="btn-xs btn-primary" data-toggle="modal" data-target="#myModal"id="openForm">Add Course</button>
          
            <select class="selector" id="selector_action">
                    <option id="delsel" value='delsel'>Delete Selected</option>
                    <option id="exp" value='exp'>Export Selected</option>
                    <!-- <option value='25'>25</option> -->
            </select>
            <select class="selector" id="selector">
                    <option value='5'>5</option>
                    <option value='10' selected>10</option>
                    <option value='25'>25</option>
                </select>
            <div class="col" id="sr">
                <input type="search" class="search" id="myInput"placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <!-- <button type="button" class="searchbtn">Search</button> -->
            </div>
          
            <!-- <button class="btn-xs btn-primary" id="delsel">Delete Selected</button>
            <button class="btn-xs btn-primary" id="exp">Export Selected</button> -->
            <!-- <button class="btn-xs btn-primary" id="expall">Export</button> -->
            <br>
            <div class="alert alert-success" id="success-alert">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <p id="ssa"></p>
            </div>
            <div class="alert alert-danger" id="danger-alert">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p id="dsa"></p>
            </div>
                
        </div> 
        <section>
        <br/>
    <div class="container justify-content-center">
      <div class="row">
          <div class="col">
            

            </div>

        </div>

    </div>

    </section>
    </body>
</html>