<?php 


class interns{
    public $name;
    public $age;
    public $clg;
    public function __construct($name,$age,$clg){
        $this->name = $name;
        $this->age = $age;
        $this->clg = $clg;
    }
    public function msg(){
        return "<p>My name is ".$this->name." and I'm " .$this->age." years old and i study in ".$this->clg. "!";  
    }

}

$intern= new interns("Jay", 23,"Gtu");
echo $intern->msg();



?>