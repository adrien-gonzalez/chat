<?php

session_start();
include("../include/config.php");

// REQUETE ID UTILISATEUR
$login = $_SESSION['login'];
$req_id= "SELECT id FROM user WHERE login='$login'";
$execute_req_id = mysqli_query($base, $req_id);
$resultat_req_id = mysqli_fetch_array($execute_req_id);
$id = $resultat_req_id['id'];

// REQUETE MESSAGE
$req_message = "SELECT message.id, login, message, date_hour FROM message, user WHERE id_chan = 1 and user.id = id_user";
$execute_req_message = mysqli_query($base, $req_message);
$ifexist=mysqli_num_rows($execute_req_message);

if($ifexist != 0)
{
	while($row = mysqli_fetch_assoc($execute_req_message)){
	    $json[] = $row;
	}
	echo json_encode($json);
}

?>