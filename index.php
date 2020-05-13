<?php
require 'class/bdd.php';
require 'class/user.php';

session_start();

if(!isset($_SESSION['bdd']))
{
    $_SESSION['bdd'] = new bdd();
}
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = new user();
}


?>
<!DOCTYPE html>
<html>
<head>
        <title>Accueil</title> 
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
</head>

<header>
<?php require 'include/nav.php'?>
</header>

<body>


<main>

</main>
<?php require 'include/footer.php'?>


</body>

</html>