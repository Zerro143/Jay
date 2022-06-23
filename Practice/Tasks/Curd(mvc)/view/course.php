<html>
    <?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
    <head>
        <title>CURD with MVC Pattern</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/jquery.js"></script>
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
    <section id = "course_form" class="container mt-5">
        <?php include 'addcr.php';?>
    </section>

    </body>
</html>