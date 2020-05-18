<?php 
require 'class/bdd.php';
require 'class/user.php';
require 'class/admin.php';


session_start();



if(!isset($_SESSION['bdd']))
{
    $_SESSION['bdd'] = new bdd();
}

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = new user();
}

if(!isset($_SESSION['admin'])){
    $_SESSION['admin'] = new admin();
}



?>

<html>

<head>
        <title>Administration</title> 
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="js/connexion.js"></script>
        <link rel="stylesheet" href="css/style.css">
</head>
<header>
<?php require 'include/nav.php'?>
</header>
    <body>
   

    <main>
    
    <section class="panneau">
    <h1>Administration</h1>

        <div class="gestion_user"> 
           
    
    <section class="bloc">
                <article>
                <?php $_SESSION["admin"]->tableau_utilisateurs(); ?>
                </article>
    </section>

</section>
        </div>

     </section>


        </main>

      

    </body>
    <footer>
<?php require 'include/footer.php'?>
</footer>
</html>
