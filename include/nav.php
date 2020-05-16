<?php
if (isset($_SESSION['login']))
 {
    
?>

<nav>
    <div class="nav-wrapper">
    <a href="index.php" class="brand-logo left"><i class="material-icons">polymer</i>Pouik</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="profil.php">Mon profil</a></li>
                <li><a href="#">Chat</a></li>
                
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
 </form>

<?php				
}
else
 {
?>


<nav>
    <div class="nav-wrapper">
    <a href="index.php" class="brand-logo left"><i class="material-icons">polymer</i>Pouik</a>
        <ul class="right hide-on-med-and-down">
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="inscription.php"> Inscription</a></li>
                <li><a href="connexion.php"> Connexion</a></li> 
        </ul>
    </div>
</nav>

<?php
 }
?>