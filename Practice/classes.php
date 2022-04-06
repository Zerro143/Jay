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


echo $name ;


?>