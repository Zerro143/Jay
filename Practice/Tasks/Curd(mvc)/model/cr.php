<?php

class course
{
    // table fields
    public $course_id;
    public $course;
    
    // message string
    public $course_id_msg;
    public $course_msg;
    // constructor set default value
    function __construct()
    {
        $course_id=0;$course="";
        $course_id_msg=$course_msg="";
    }
}

?>