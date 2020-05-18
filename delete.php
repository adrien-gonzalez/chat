<?php 
include ('include/config.php');
$id= $_GET['id'];
var_dump($id);
$select ="DELETE FROM `user` WHERE `id`.`user` =  $id ";
var_dump($select);
$query=mysqli_query($base,$select) or die ($select);

header("location:admin.php");
?>