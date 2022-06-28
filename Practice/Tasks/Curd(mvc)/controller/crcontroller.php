<?php 
//https://docs.google.com/spreadsheets/d/1qEejf4ESD1P00_H0G0KnDyTpxX8jlWKm90XM71vk9XM/edit#gid=1146114837
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  
?>
<?php
    require '../model/crmodel.php';
    require '../model/st.php';
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
                case 'update_std':
					$this->upd_std();
					break;	
                case'exp':
                    $this->exp();
                    break;
                case 'edit_std':
					$this->edit_std();
					break;	
                case 'addstd':
                    $this->add_std();
                    break;
                case 'del_std':
                    $this->del_std();
                    break;
                case 'add_course' :   
                    $this->insert_course();
					break;						
				case 'edit_course':
					$this->edit_course();
					break;				
				case 'del_course' :					
                    $this -> delete_course();
					break;		
                case 'update_course':
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
            // $result[1] = ;
            
            echo json_encode($result);    
        }

        public function course()
        {
            if (isset($_POST['page'])) {    
                $page  = $_POST['page'];    
            }    
            else {    
              $page=1;    
            } 
            if (isset($_POST['sel'])){
                $per_page_record = $_POST['sel']; 
            }
            
            else{$per_page_record = 10;}

            $start_from = ($page-1) * $per_page_record;   
            $result=$this->objcm->select_courseRecord(0,$start_from,$per_page_record);
            $result[1]['page']= $page;
            $result[1]['record']=$per_page_record;  
            $result[1]['start_from'];
            
            echo json_encode($result);          
        }
        //export to csv

        public function exp()
        {

            $ids = $_POST['ids'];
            $output = fopen("../export/output.csv", "w");
 
            switch($_POST['c']){
                case 'course':
                    fputcsv($output, array('Course'));
                    foreach ($ids as $id)
                    {
                        $result=$this->objcm->select_courseRecord($id,'a','b');  
                        // print_r($result);
                         $course[]= $result[0][0];
 
                        fputcsv($output,array($result[0][0]['course']));

                        
                    }

                    

                    break;
                case 'student': 
                    fputcsv($output, array('First Name','Last Name','Email','Mobile no.','Course', 'B.date','Created_Date','Updated_Date'));
                    foreach ($ids as $id)
                    {
                        $result=$this->objcm->select_studentRecord($id); 
                       
                        fputcsv($output,$result[0]);
                        
                    }
                    
                    break;
                default:
                    return "error";
                    break;
            }
            fclose($output);
        }
         
        // add new record

        public function add_std()
        {
            $student = new student();

            $student->fname=($_POST['b']);
            $student->lname=($_POST['c']);
            $student->bdate=($_POST['d']);
            $student->m=($_POST['e']);
            $student->mail=($_POST['f']);
            $student->course_id=($_POST['g']);
            $student->cdate=($_POST['h']);
            $student->udate=($_POST['h']);
            $result=$this->objcm->insert_student($student);
            echo $result;
        }
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
        public function del_std()
		{
            try
            {
               
                $ids=$_POST['c'];
                if(is_array($ids)){
                    foreach ($ids as $id)
                    {
                        $res=$this->objcm->delete_stdRecord($id);      
                        echo $id;
                        
                    }
                }else{
                    $res=$this->objcm->delete_stdRecord($ids);
                    echo $ids;
                }
            }
            catch (Exception $e) 
            {
               			
                throw $e;
            }
        }

        public function delete_course()
		{
            try
            {
                // if(isset($_POST['c'])){
                    $ids=$_POST['c'];
                    if(is_array($ids)){
                        foreach ($ids as $id)
                        {
                            $res=$this->objcm->delete_courseRecord($id);      
                            echo $id;
                            
                        }
                    }else{
                        $res=$this->objcm->delete_courseRecord($ids);
                        echo $ids;
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
                $result=$this->objcm->select_courseRecord($id,0,1);
  
                echo json_encode($result);     
  

            }
            catch (Exception $e) 
            {
               		
                throw $e;
            }
        }

        public function edit_std()
		{
            try
            {
                $id = $_POST['c'];
                $result=$this->objcm->select_studentRecord($id);
                $c=$this->objcm->select_courseRecord(0,0,10);
                $result[1] = $c;
                // print_r ($result);
                echo json_encode($result);
 
            }
            catch (Exception $e) 
            {
               		
                throw $e;
            }
        }
        //update record

        public function upd_std()
        {
            try
            {

                $id = $_POST['i'];
                $fname = $_POST['b'];
                $lname = $_POST['c'];
                $email = $_POST['f'];
                $m = $_POST['e'];
                $course_id =$_POST['g'];
                $bdate= $_POST['d'];
                $cdate= $_POST['h'];
                
                $result=$this->objcm->update_studentRecord($fname,$lname,$email,$m,$course_id,$bdate,$cdate,$id);
                echo $result;
            }
            catch (Exception $e) 
            {
			
                throw $e;
            }
        }

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