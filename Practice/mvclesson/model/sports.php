<?php

class sports
{
    // table fields
    public $id;
    public $category;
    public $name;
    // message string
    public $id_msg;
    public $category_msg;
    public $name_msg;
    // constructor set default value
    function __construct()
    {
        $id=0;$category=$name="";
        $id_msg=$category_msg=$name_msg="";
    }
}

?>