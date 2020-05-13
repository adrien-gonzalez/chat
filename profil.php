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
if($_SESSION['user']->isConnected() != true){
    header('Location:index.php');
}?>
<!DOCTYPE html>
<html>

<head>
        <title>Profil</title> 
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
<h1> Mon compte </h1>

    <section class="bloc">
        <h3>Mes Informations</h3>
            <?php
          $_SESSION["user"]->mes_info();
          ?>
    </section>
   
    <section class="bloc">
        <h3>Modifier mes informations</h3>
    
                <form action="profil.php" method="POST">
                    <label>Identifiant : </label>
                    <input type="text" name="login" value="<?php echo $_SESSION['user']->getlogin(); ?>"><br>
                    <label>Mail :</label>
                    <input type="mail" name="mail" value="<?php echo $_SESSION['user']->getmail() ?>"><br>
                    <label>Mot de passe : </label>
                    <input type="password" name="psw" minlength="5" /><br>
                    <label>Confirmation du mot de passe :</label>
                    <input type="password" name="pswconf" required><br>
                    <input type="submit" name="send">
                    </form>

    <?php // modif login/mail/mdp 
   
?>
    </section>
     
    

    <section class="bloc">
        <h2></h2>

        <article>


        </article>
    </section>


    <section class="bloc">
        <h3>Me désinscrire</h3> 
        <form class="formulaire" method="post">
            <button type="submit" name="desinscription">Se désinscrire</button>
        </form>

        <?php 
        if(isset($_POST["desinscription"]))
        {
            //add function qui delete trace laisser par utilisateur
            $_SESSION["user"]->desinscription('id');
        }
        ?>
    </section>

</section>


</main>

<?php require 'include/footer.php'?>

</body>

</html>