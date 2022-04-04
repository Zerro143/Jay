<?php
include '../need.php';
echo readfile("dict.txt");
ln();
$myfile = fopen("dict.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("dict.txt"));
fclose($myfile);

$myfile = fopen("dict.txt", "r") or die("Unable to open file!");
ln();
echo fread($myfile,filesize("dict.txt"));
fclose($myfile);
?>