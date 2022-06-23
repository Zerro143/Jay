<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../model/crmodel.php';
require '../model/cr.php';
require_once '../config.php';



class crController 
{

     function __construct() 
    {          
        $this->objconfig = new config();
        $this->objsm =  new crmodel($this->objconfig);
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
                $this->update();
                break;				
            case 'delete' :					
                $this -> delete();
                break;								
            default:
                $this->list();
        }
    }		
   
    public function list(){
        $result=$this->objsm->selectRecord(0);
        return $result;                                      
    }
}
$controller = new crController();	
$controller->mvcHandler();
    
?>