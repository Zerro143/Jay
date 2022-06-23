<?php

class student
{
    // table fields
    public $id;
    public $fname;
    public $lname;
    public $email;
    public $m;
    public $course_id;
    public $bdate;
    public $cdate;
    public $udate;
    public $course;
    

    // constructor set default value
    function __construct()
    {
        $id=0;$fname = $lname = $email = $m = $course_id = $bdate = $cdate = $udate = $course = "";

    }
}

?>