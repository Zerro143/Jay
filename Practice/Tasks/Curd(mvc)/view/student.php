<html>
<style>
           /*Hidden class for adding and removing*/
.hidden{
  display: none;
}
.loader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #fff;
}

.loader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #504e70;
  border-top-color: #fff;
  border-bottom-color: #fff;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1s linear infinite;
  animation: animate-preloader 1s linear infinite;
}

@-webkit-keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
th {
      cursor: pointer;
    }
    </style>
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
    <head>
        <title>CURD with MVC Pattern</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <script src="../assets/js/jquery.js"></script>

        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="../assets/js/saction.js"></script>

        <!-- <script src="../assets/js/craction.js"></script> -->
    </head>
    <body>
    <section id ="nav">
        <?php include 'nav.php';?>
        <br>
        <?php include 'btn.php';?>
    </section>
    <section id = "main">
    <input type="hidden" id="sortby"dt="id" order="ASC"/>
        <div class="container" id="dta">
            <table class="table" id="tda">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id="master"></th>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Course</th>
                        <th>B.Date</th>
                        <th>Created_Date</th>
                        <th>Updated_Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id="student_content">

                </tbody>
            </table>
            <?php include 'pagination.php';?>
        </div>

    </section>
    <section id = "course_form" class="container mt-5">
        <!-- <?php include 'addcr.php';?> -->
      
    </section>
    <section id="pagination">
 
    </section>
    <section id ="student_form" class="container mt-5">
    <div class="modal fade" id="md" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="mdcl" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Student</b></h4>
                </div>
                <div class="modal-body">
                <div class="loader"id="mload"></div>
                    <div id="mdata"><?php include 'addstd.php';?> </div>
                </div>
                <div class="modal-footer">
                    <button type="button"  id ="upd" class="btn btn-info" placeholder="update" value="update1">Update</button>
                    <button type="button" id="add1" class="btn btn-primary" value = "add1">Add</button>
                    
                </div>
            </div>
      
        </div>
    </div>
   
    </section>
    <div class="loader"id="preloader"></div>

    </body>
</html>