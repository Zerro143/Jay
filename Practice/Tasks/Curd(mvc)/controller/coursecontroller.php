<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../model/courseModel.php';
//require '../model/course.php';
require_once '../config.php';

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
        $this->ls();
        //if(isset($_POST['a'])){
        //$a = $_POST['a'];
        $a = "0";
        echo $a;
        // if ($a == "add"){
            // $this->add();
        //  }
        //}
    }

    //page redirection
    public function pageRedirect($url)
    {
        header('Location:'.$url);
    }
    
    public function ls(){
     $result=$this->objsm->selectRecord(0);
     print_r($result);
     //include "view/crli.php";   
    }

    public function add(){
        try{
        
           $course = new course();
           $course->course = $_POST['b'];
        //$tr=$this->objsm->insertRecord($course);
            print_r($course);
        }
        catch (Exception $e){
        //    $this->close_db();
            throw $e;
        }

    }



}
$controller = new controller();
$controller->mvcHandler();
?>