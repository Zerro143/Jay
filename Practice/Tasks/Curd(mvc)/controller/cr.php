<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../config.php';
require '../model/courseModel.php';

class controller{
    function __construct()
    {
        $this->objconfig = new config();
        $this->objsm = new courseModel($this->objconfig);
    }
    
    public function mvcHandler(){

        }
    }
}


?>