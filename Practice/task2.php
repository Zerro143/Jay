<head> <style>
*{
margin: 0px;
padding: 0px;
box-sizing: border-box;

}

.tab{

border: 1px solid black;
width: 80%;
margin-left: 5px;
margin-top: 10px;
}

.row{
border-right: 1px solid black;
text-align: center;

}
</style>
</head>
<body>
<table width="80%">
<?php
#Task 2 Print table of 1 to 10 using loop
include 'need.php';


for ($a = 1; $a < 11; $a++){

   echo "<tr>";

    for ($b=1; $b<11;$b++){
        $x = $b * $a; 
        if($b == 8){
            continue;
        }
        echo "<td class=row>$b X $a = $x</td>" ;
             
    }
    
    echo "</tr>";
   

}
?>
</table>
</body>