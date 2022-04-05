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
space();
ln();
$myfile = fopen("nw.txt", "a") or die("Unable to open file!");
$txt = "Donald Duck\n";
fwrite($myfile, $txt);
$txt = "Goofy Goof\n";
fwrite($myfile, $txt);
echo fread($myfile,filesize("nw.txt"));
fclose($myfile);
$myfile = fopen("nw.txt", "a+");
fwrite($myfile, $txt);
echo fread($myfile,filesize("nw.txt"));
?>