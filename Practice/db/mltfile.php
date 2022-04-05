<?php include'upload.php'; ?>
<!DOCTYPE html>
<html>
<body>
<div class="upload-form">
<form  method="post" enctype="multipart/form-data">
    <input type="file" name="file_name[]" multiple>
    <input type="submit" value="Upload File" name="submit">
</form>
</div>
</body>
</html>