<?php

class sports
{
    // table fields
    public $course_id;
    public $course;
    
    // message string
    public $crid_msg;
    public $course_msg;
    
    // constructor set default value
    function __construct()
    {
        $course_id=0;$course="";
        $crid_msg=$course_msg="";
    }
}

?>