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
				case 'edit':

					$this->edit();
					break;				
				case 'del' :					

                    $this -> delete();
					break;		
                case 'update':
                    $this->update();						
				default:
                    $this->list();
			}
		}		



        public function list(){
            $result=$this->objcm->selectRecord(0);
            echo json_encode($result);          
        }
         
        // add new record
		public function insert()
		{
            
            try{

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

        // edit retrive record
        public function edit()
		{
            try
            {
                $id = $_POST['c'];
                $result=$this->objcm->selectRecord($id);
  
                echo json_encode($result);     
  

            }
            catch (Exception $e) 
            {
               		
                throw $e;
            }
        }
        
        //update record
        public function update()
        {
            try
            {
                $id = $_POST['c'];
                $course = $_POST['b']; 
                $result=$this->objcm->updateRecord($id,$course);
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