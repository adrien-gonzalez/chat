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
if($_SESSION['user']->isConnected() != false){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>Connexion</title> 
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <meta charset="UTF-8">

</head>

<header>
<?php require 'include/nav.php'?>
</header>
<body>


<main>


<section class="panneau">
<h1> Connexion </h1>

        <section class="bloc">
   
        <form class="formulaire" action="connexion.php" method="post">
        
            <label>Identifiant : </label>
            <input type="text" name="login" required><br>
            <label>Mot de passe :</label>
            <input type="password" name="psw" required><br>

            <input type="submit" name="send">
        </form>

</section>
<?php
if(isset($_POST["send"])){
    if($_SESSION["user"]->connexion($_POST["login"],$_POST["psw"]) == false){
        ?>
            <p>Un problème est survenue lors de la connexion veuillez vérifer vos informations de connexion</p>
        <?php
    }
    else{
        $_SESSION["user"]->connexion($_POST["login"],$_POST["psw"]);
        $_SESSION["login"] = true;
        if($_SESSION['user']->getrole() == "admin"){
            $_SESSION["perm"] = true;
        }
        header('location:index.php');
    }
    
}

?>
</section>


</main>
<?php require 'include/footer.php'?>


</body>

</html>