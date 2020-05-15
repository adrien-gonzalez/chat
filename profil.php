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
          <article>
              <ul>
                  <li>Mon pseudo : <?php echo $_SESSION['user']->getlogin(); ?></li>
                  <li>Mon mail : <?php echo $_SESSION['user']->getmail() ?></li>
              </ul>
          </article>

    </section>
   
    <section class="bloc">
        <h3>Modifier mes informations</h3>
    
                <form action="profil.php" method="POST" name="profil">
                    
                    <label>Identifiant : </label>
                    <input type="text" name="login" value="<?php echo $_SESSION['user']->getlogin(); ?>"><br>
                    <label>Mail :</label>
                    <input type="mail" name="mail" value="<?php echo $_SESSION['user']->getmail() ?>"><br>
                    <label>Mot de passe : </label>
                    <input type="password" name="psw" minlength="5" /><br>
                    <label>Confirmation du mot de passe :</label>
                    <input type="password" name="pswconf" required><br>
                    
                    <input TYPE="button" VALUE="Reset le formulaire" onClick="this.form.reset();">
                    <input type="submit" name="submit" id="submit"  value="Envoyer"></button>
                    
                </form>
                <p id="erreur"></p>

        <?php 
        if(isset($_POST["submit"]))
        {
            //add function qui delete trace laisser par utilisateur
            $_SESSION["user"]->profil($_POST['login'],$_POST['mail'],$_POST['psw'],$_POST['pswconf']);
        }
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