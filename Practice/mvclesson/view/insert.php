<?php
        require '../model/sports.php'; 
        session_start();             
        $sporttb=isset($_SESSION['sporttbl0'])?unserialize($_SESSION['sporttbl0']):new sports();            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="../libs/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add Course</h2>
                        
                    </div>
                    <p>Please fill this form and submit to add sports record in the database.</p>
                    <form action="../index.php?act=add" method="POST" >
                        <div class="form-group <?php echo (!empty($sporttb->course_msg)) ? 'has-error' : ''; ?>">
                            <label>Course</label>
                            <input type="text" name="course" class="form-control" value="<?php echo $sporttb->course; ?>">
                            <span class="help-block"><?php echo $sporttb->course_msg;?></span>
                        </div>
                       
                        <input type="submit" name="addbtn" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>