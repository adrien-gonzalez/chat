<html>

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


<head>
        <title>Inscription</title> 
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
</head>

<body>
<?php require 'include/nav.php'?>

<main>
    <section class="panneau">
    <h1>Inscription</h1>

        <section class="bloc"> 
        <form class="formulaire" action="inscription.php" method="post">
        
            <label>Identifiant :</label>
            <input type="text" name="login" required><br>
            <label>Prénom :</label>
            <input type="text" name="name" required><br>
            <label>Nom :</label>
            <input type="text" name="surname" required><br>
            <label>Mail :</label>
            <input type="mail" name="mail" required><br>
            <label>Mot de passe :</label>
            <input type="password" name="psw" minlength="5" required><br>
            <label>Confirmation du mot de passe :</label>
            <input type="password" name="pswconf" minlength="5" required><br>
            <input type="submit" name="send">
        </form>

    </section>

<?php

if(isset($_POST['send'])){
    
$_SESSION["user"]->inscription($_POST['login'],$_POST['name'],$_POST['surname'],$_POST['mail'],$_POST['psw'],$_POST['pswconf']);
    
}

?>
</section>


</main>
<?php require 'include/footer.php'?>


</body>

</html>