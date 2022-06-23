<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  
?>
<?php
    require '../model/crmodel.php';
    //require '../model/cr.php';
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
                    $this->insert_course();
					break;						
				case 'edit':

					$this->edit_course();
					break;				
				case 'del' :					

                    $this -> delete_course();
					break;		
                case 'update':
                    $this->update_course();	
                    break;	
                case 'course':
                    $this->course();
                    break;				
				default:
                    $this->student();
			}
		}		


        public function student()
        {
            $result=$this->objcm->select_studentRecord(0);
            //print_r($result);
            echo json_encode($result);    
        }

        public function course()
        {
            $result=$this->objcm->select_courseRecord(0);
            echo json_encode($result);          
        }
         
        // add new record
		public function insert_course()
		{
            
            try{

                if (isset($_POST['b'])) 
                { 
                    $course = $_POST['b'];
                    $tr =$this->objcm->insert_courseRecord($course);
                    echo $tr;
                }
            }catch (Exception $e) 
            {
                throw $e;
            }
        }

        //delete record
        public function delete_course()
		{
            try
            {
               
                if (isset($_POST['c'])) 
                {
                    $id=$_POST['c'];
                    // echo $id;
                    $res=$this->objcm->delete_courseRecord($id);                
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

        // edit retrive record
        public function edit_course()
		{
            try
            {
                $id = $_POST['c'];
                $result=$this->objcm->select_courseRecord($id);
  
                echo json_encode($result);     
  

            }
            catch (Exception $e) 
            {
               		
                throw $e;
            }
        }

        //update record
        public function update_course()
        {
            try
            {
                $id = $_POST['c'];
                $course = $_POST['b']; 
                $result=$this->objcm->update_courseRecord($id,$course);
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