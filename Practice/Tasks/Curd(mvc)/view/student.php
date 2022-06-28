<html>
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Student</b></h4>
                </div>
                <div class="modal-body">
                   
                    <?php include 'addstd.php';?> 
                </div>
                <div class="modal-footer">
                    <button type="button"  id ="upd" class="btn btn-info" placeholder="update" value="update1">Update</button>
                    <button type="button" id="add1" class="btn btn-primary" value = "add1">Add</button>
                    
                </div>
            </div>
      
        </div>
    </div>
   
    </section>

    </body>
</html>