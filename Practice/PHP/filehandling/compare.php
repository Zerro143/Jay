<?php 
include '../need.php';

?>
<form action="compare.php" method="post" enctype="multipart/form-data" id="f">
    <div class="form-group">
        <label for="exampleFormControlFile1">Please Select File</label>
        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <input type="submit" id = "btn"name="submit" value="submit" class="btn btn-primary">
    </div>
</form>
<script src="assets/js/jquery.js"></script>
<script>
    $("#btn").click(function(e){
        e.preventDefault();
        
    })
</script>