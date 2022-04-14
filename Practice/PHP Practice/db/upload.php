<?php 
require_once 'conn.php';

$db=$conn; // Enter your Connection variable;
$tableName='files'; // Enter your table Name;


$fetchFiles=fetch_files($tableName);

// uploading files on submit
if(isset($_POST['submit'])){ 

    //  uploading files
    echo upload_files($tableName); 
}

function upload_files($tableName){

    $fileName = array_filter($_FILES['file_name']['name']);
   
    $tableName= trim($tableName);
    
    
     $error=$storeFilesBasename='';

    foreach($fileName as $index=>$file){
         
    $fileBasename = basename($fileName[$index]);                      
      // Store Files into database table
      $storeFilesBasename .= "('".$fileBasename."'),"; 
       
     
    }

    store_files($storeFilesBasename, $tableName);
  

    return $error;
}
    // File upload configuration 

    function store_files($storeFilesBasename, $tableName){
      global $db;
      if(!empty($storeFilesBasename))
      {
      $value = trim($storeFilesBasename, ',');


       $store="INSERT INTO ".$tableName." (filename) VALUES".$value;

      
      $exec= $db->query($store);
       if($exec){
       
        echo "files are uploaded successfully";
         
       }else{
        echo  "Error: " .  $store . "<br>" . $db->error;
       }
      }
    }
   
      
      // fetching padination data
function fetch_files($tableName){
   global $db;
   $tableName= trim($tableName);
   if(!empty($tableName)){
  $query = "SELECT * FROM ".$tableName." ORDER BY id DESC";
  $result = $db->query($query);

if ($result->num_rows > 0) {
    $row= $result->fetch_all(MYSQLI_ASSOC);
    return $row;       
  }else{
    
    echo "No files are stored in database";
  }
}else{
  echo "you must declare table name to fetch files";
}
}   
    
?>