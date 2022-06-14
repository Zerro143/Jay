<?php
    require 'model/sportsModel.php';
    require 'model/sports.php';
    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class sportsController 
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
			$this->objsm =  new sportsModel($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{
                case 'add' :                    
					$this->insert();
					break;						
				case 'update':
					$this->update();
					break;				
				case 'delete' :					
					$this -> delete();
					break;								
				default:
                    $this->list();
			}
		}		
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
		public function checkValidation($sporttb)
        {    $noerror=true;
            // Validate category        
            if(empty($sporttb->course)){
                $sporttb->course_msg = "Field is empty.";$noerror=false;
            } elseif(!filter_var($sporttb->course, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $sporttb->course_msg = "Invalid entry.";$noerror=false;
            }else{$sporttb->course_msg ="";}            
            // Validate name            

        }
        // add new record
		public function insert()
		{
            try{
                $sporttb=new sports();
                if (isset($_POST['addbtn'])) 
                {   
                    // read form value
                    $sporttb->course = trim($_POST['course']);
                    
                    //call validation
                    $chk=$this->checkValidation($sporttb);  
                                     
                    if($chk)
                    {   
                        //call insert record            
                        $pid = $this -> objsm ->insertRecord($sporttb);
                        if($pid>0){			
                            $this->list();
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {    
                        $_SESSION['sporttbl0']=serialize($sporttb);//add session obj           
                        $this->pageRedirect("view/insert.php");   
                        $sporttb->course_msg=$chk;              
                    }
                }
            }catch (Exception $e) 
            {
                $this->close_db();	
                throw $e;
            }
        }
        // update record
        public function update()
		{
            try
            {
                
                if (isset($_POST['updatebtn'])) 
                {
                    $sporttb=unserialize($_SESSION['sporttbl0']);
                    $sporttb->course_id = trim($_POST['course_id']);
                    $sporttb->course = trim($_POST['course']);
                              
                    // check validation  
                    $chk=$this->checkValidation($sporttb);
                    if($chk)
                    {
                        $res = $this -> objsm ->updateRecord($sporttb);	                        
                        if($res){			
                            $this->list();                           
                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {         
                        $_SESSION['sporttbl0']=serialize($sporttb);      
                        $this->pageRedirect("view/update.php");                
                    }
                }elseif(isset($_GET["course_id"]) && !empty(trim($_GET["course_id"]))){
                    $course_id=$_GET['course_id'];
                    $result=$this->objsm->selectRecord($course_id);
                    $row=mysqli_fetch_array($result);  
                    $sporttb=new sports();                  
                    $sporttb->course_id=$row["course_id"];
                    $sporttb->course=$row["course"];
                    
                    $_SESSION['sporttbl0']=serialize($sporttb);
                    $this->pageRedirect('view/update.php');
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        // delete record
        public function delete()
		{
            try
            {
                if (isset($_GET['course_id'])) 
                {
                    $course_id=$_GET['course_id'];
                    $res=$this->objsm->deleteRecord($course_id);                
                    if($res){
                        $this->pageRedirect('index.php');
                    }else{
                        echo "Somthing is wrong..., try again.";
                    }
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
        }
        public function list(){
            $result=$this->objsm->selectRecord(0);
            include "view/list.php";                                        
        }
    }
		
	
?>