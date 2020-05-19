<?php 
	include ('../include/config.php');

	$id = $_POST['id'];

	$select ="DELETE FROM user WHERE id =  '$id' ";
	$query=mysqli_query($base, $select) or die ($select);
?>