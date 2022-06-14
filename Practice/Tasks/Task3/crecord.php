<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    </head>
    <body>
    <section id="header">
      <?php   include 'nav.php';?>
    </section>
    <?php   include 'alert.php';?>
    <div class="container">
    <div class="row">
        <div class="col-25">
          <?php //<a class="btn btn-primary" onclick="openForm()">Add</a>?>
          <div style="padding-left:20px">
            <div class="form" id="myForm">
              <form action="upcr.php" class="form-container" method="POSt">
                <input type="hidden" name="id" value="<?php echo $id = $_SESSION['cid'];?>">
                <div class="row">
                    <div class="col-25">
                        <label for="course"><b>Couse Name</b></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-75">
                        <input type="text" placeholder="Enter course" name="course" value="<?php echo /*$course;*/$_SESSION['course'];  unset($_SESSION['course']);?>" >
                    </div>
                </div>
                 <div class="row"></div>     
               <div class="row">
                    <div class="col-25">
                    <?php
                      if($_SESSION['crupdate']==true):
                    ?>
                      <center><button type="submit" class="btn btn-info" placeholder="update" name="update">Update</button></center>
                    <?php unset($_SESSION['crupdate']); ?>  
                    <?php else:?>
                     <center><button type="submit" class="btn btn-primary" placeholder="ADD" name="add">Add</button></center> 
                    <?php endif;?>
                    </div>
               </div>  
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>  
    </body>
</html>