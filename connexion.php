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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="js/connexion.js"></script>

</head>

<header>
<?php require 'include/nav.php'?>
</header>
<body>


<main>


<section class="panneau">
<h1> Connexion </h1>

        <section class="bloc">
   
        <form name="connexion" action="connexion.php" method="post">
        
            <label>Identifiant : </label>
            <input type="text" name="login" required><br>
            <label>Mot de passe :</label>
            <input type="password" name="psw"  minlength="5" required ><br>

            <input TYPE="button" VALUE="Reset le formulaire" onClick="this.form.reset();">
            <input type="submit" name="submit" id="submit"  value="Envoyer"></button>
        </form>
        <p id="erreur"></p>
</section>
<?php
if(isset($_POST["submit"])){
    if($_SESSION["user"]->connexion($_POST["login"],$_POST["psw"]) == false){
        ?>
            <p>Un problème est survenue lors de la connexion veuillez vérifer vos informations de connexion</p>
        <?php
    }
    else{
        $_SESSION["user"]->connexion($_POST["login"],$_POST["psw"]);
        $_SESSION["login"] = true;
        if($_SESSION['user']->getrank() == "admin"){
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