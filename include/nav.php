<?php
if (isset($_SESSION['login']))
 {
    
?>

<nav>
    <ul>
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
 </nav>
 </form>

<?php				
}
else
 {
?>


<nav>
    <ul>
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="inscription.php"> Inscription</a></li>
            <li><a href="connexion.php"> Connexion</a></li> 
            
		
             
     </ul>
</nav>

<?php
 }
?>