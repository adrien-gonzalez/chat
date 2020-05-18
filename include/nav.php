<?php
if (isset($_SESSION['login']))
 {
    
?>

<nav class="sidenav-trigger">
    <div class="nav-wrapper">
    <a href="index.php" class="brand-logo center"><i class="material-icons">polymer</i>Pouik</a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>        
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="profil.php">Mon profil</a></li>
                <li><a href="sources/chat.php">Chat</a></li>
                
                <?php 
                if(isset($_SESSION['perm'])){
                ?>
                <li><a href="admin.php">Admin</a>
                    <?php
                }
                ?>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
    </div>
 </nav>
 
 <ul class="sidenav" id="mobile-demo">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="inscription.php">Inscription</a></li>
    <li><a href="connexion.php">Connexion</a></li>
    
  </ul>
<?php				
}
else
 {
?>


<nav class="sidenav-trigger">
    <div >
    <a href="index.php" class="brand-logo center"><i class="material-icons">polymer</i>Pouik</a>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>            
    <ul class="right hide-on-med-and-down">
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="inscription.php"> Inscription</a></li>
                <li><a href="connexion.php"> Connexion</a></li> 
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>
<?php
 }
?>