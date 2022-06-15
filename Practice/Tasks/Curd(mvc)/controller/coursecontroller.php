<?php
require '/model/courseModel.php';
require 'model/course.php';
require_once 'config.php';

class controller{
    function __construct()
    {
        $this->objconfig = new config();
        $this->objsm = new courseModel($this->objconfig);
    }

    //mvc handler request 
    public function mvcHandler(){
      //if(isset($_POST['act'])){
      //  $act = $_POST['act'];
      //  if($act == "cr"){
      //      $this->cr();
      //  }else{
      //      $this->cr();
      //  }
      //}
      //else{
      //  $this->cr();
      //}
        cr();
    }

    //page redirection
    public function pageRedirect($url)
    {
        header('Location:'.$url);
    }
    
    public function cr(){
     $result=$this->objsm->selectRecord(0);
     include "view/crli.php";   
    }




}
?>