<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  
?>
<?php
    require '../model/crmodel.php';
    require '../model/cr.php';
    require_once '../config.php';

 
    
	class crController 
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
			$this->objcm =  new crmodel($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_POST['a']) ? $_POST['a'] : NULL;
			switch ($act) 
			{
                case 'add' :   
                    $this->insert();
					break;						
				case 'update':
                    // echo "Welcome to update";
					$this->update();
					break;				
				case 'del' :					
					// echo "Welcome to delete";
                    $this -> delete();
					break;								
				default:
                    $this->list();
			}
		}		



        public function list(){
            $result=$this->objcm->selectRecord(0);
            while($row = mysqli_fetch_array($result)){
                $data[]=$row;
            }
            echo json_encode($data);          
        }
         
        // add new record
		public function insert()
		{
            
            try{
                //$sporttb=new course();
                if (isset($_POST['b'])) 
                { 
                    $course = $_POST['b'];
                    $tr =$this->objcm->insertRecord($course);
                    echo $tr;
                }
            }catch (Exception $e) 
            {
                throw $e;
            }
        }

        //delete record
        public function delete()
		{
            try
            {
               
                if (isset($_POST['c'])) 
                {
                    $id=$_POST['c'];
                    // echo $id;
                    $res=$this->objcm->deleteRecord($id);                
                    echo $res;
                }else{
                    echo "false";
                }
            }
            catch (Exception $e) 
            {
               			
                throw $e;
            }
        }

        // update record
        public function update()
		{
            try
            {
                $id = $_POST['c'];
                $course = $_POST['b'];
                $res = $this -> objcm ->updateRecord($id,$course);	  
        //         if (isset($_POST['updatebtn'])) 
        //         {
        //             $sporttb=unserialize($_SESSION['sporttbl0']);
        //             $sporttb->id = trim($_POST['id']);
        //             $sporttb->category = trim($_POST['category']);
        //             $sporttb->name = trim($_POST['name']);                    
        //             // check validation  
        //             $chk=$this->checkValidation($sporttb);
        //             if($chk)
        //             {
        //                 $res = $this -> objsm ->updateRecord($sporttb);	                        
        //                 if($res){			
        //                     $this->list();                           
        //                 }else{
        //                     echo "Somthing is wrong..., try again.";
        //                 }
        //             }else
        //             {         
        //                 $_SESSION['sporttbl0']=serialize($sporttb);      
        //                 $this->pageRedirect("view/update.php");                
        //             }
        //         }elseif(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        //             $id=$_GET['id'];
        //             $result=$this->objsm->selectRecord($id);
        //             $row=mysqli_fetch_array($result);  
        //             $sporttb=new sports();                  
        //             $sporttb->id=$row["id"];
        //             $sporttb->name=$row["name"];
        //             $sporttb->category=$row["category"];
        //             $_SESSION['sporttbl0']=serialize($sporttb);
        //             $this->pageRedirect('view/update.php');
        //         }else{
        //             echo "Invalid operation.";
        //         }
            }
            catch (Exception $e) 
            {
               		
                throw $e;
            }
        }
    }
		
    $controller = new crController();	
    $controller->mvcHandler();
?>