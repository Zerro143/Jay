<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require 'model/coursemodel.php';
    require 'model/course.php';
    require_once 'config.php';
    class coursecontroller{
        function __construct()
        {
            $this->objconfig = new config();
            $this->objsm = new courseModel($this->objconfig);
        }
        
        public function mvchandler()
        {
            $this->lsc();
            //$act =isset($_GET['act'])?$_GET['act']:NULL;
            // switch($act)
            // {
                // case 'add':
                    // break;
                // case 'update':
                    // break;
                // case 'delete':
                    // break;
                // default:
                    // $this->lsc();
            // } 
        }
        public function pageRedirect($url)
        {
            header('Location:'.$url);
        }
        public function lsc(){
            $result=$this->objsm->selectRecord(0);
            include "view/course.php";
        }
    }
?>