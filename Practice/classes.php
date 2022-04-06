<?php
include 'need.php';
class pet{
    //Properties
    public $name;
    public $owner;
    public $breed;

    //Methods 
    function set_pet($name,$owner,$breed){
        $this ->name = $name;
        $this ->owner = $owner;
        $this ->breed = $breed;
    }    
}




$tyson = new pet();
$tyson -> set_pet('Tyson','Jay','Rottweiler');
echo "Pet name: ".$tyson->name."<br>  Pets Owner: " .$tyson-> owner."<br> Pets Breed: ".$tyson->breed;
space();

$bambam = new pet();
$bambam -> name = "Bambam"; $bambam ->  owner = "" ; $bambam-> breed = "Cat";
echo "Pet name: ".$bambam->name."<br>  Pets Owner: " .$bambam-> owner."<br> Pets Breed: ".$bambam->breed;

class emp{
    #Properties
    public $name;
     public $vehical;
    
    #method
    function __construct($name,$vehical)
    {
        $this-> name = $name;
        $this -> vh = $vehical;
    }        
    function __destruct() {
        echo "The Employee {$this->name} has Vehical {$this -> vh}.<br>"; 
      }
}

$jay = new emp("Jay","Pulsar 135");
$ritesh = new emp("Ritesh","Apache 160 4v");
space();
echo "Employee: ".$jay-> name. " has Vehical:".$jay -> vh;
space();
echo "Employee: ".$ritesh-> name. " has Vehical:".$ritesh -> vh;
space();
ln();

?>