<?php 
$connect = mysqli_connect('localhost','root','','studentdatabase');
if (mysqli_error($connect)) {
 die("connected successfully!");
} 

?>