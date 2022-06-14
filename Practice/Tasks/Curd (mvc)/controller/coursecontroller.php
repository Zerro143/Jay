<?php
    require 'model/courseModel.php';
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
            $act =isset($_GET['act'])?$_GET['act']:NULL;
            switch($act)
            {
                case 'add':
                    break;
                case 'update':
                    break;
                case 'delete':
                    break;
                default:
                    $this->lsc();
            } 
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