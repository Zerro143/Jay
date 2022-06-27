<html>
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
    <head>
        <title>CURD with MVC Pattern</title>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="../assets/js/jquery.js"></script>
        <!-- <script src="../assets/js/bootstrap.js"></script> -->
        <script src="../assets/js/popper.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="../assets/js/craction.js"></script>
    </head>
    <body>
    <section id ="nav">
        <?php include 'btn.php';?>
        
    </section>
    <section id = "main">
        <div class="container" id="dta">
            <table class="table" id="tda">
                <thead>
                  <tr>
                    <th><input type="checkbox" name="" id="master"></th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody id="course_content">

                </tbody>
            </table>

        </div>

    </section>
    <section id = "course_form" class="container mt-5" >
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center"><b>Course</b></h4>
                </div>
                <div class="modal-body">
                   
                    <?php include 'addcr.php';?>
                </div>
                <div class="modal-footer">
                    <button type="button" id="update" class="btn btn-info"  placeholder="update" value="update">Update</button>
                    <button type="button" id="add" class="btn btn-primary" name="add" value="add">Add</button>
                    
                </div>
            </div>
      
        </div>
    </div>

    </section>

    </body>
</html>