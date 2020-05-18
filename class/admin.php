<?php

class admin extends user{


    private $id = NULL;
    private $login = NULL;
    private $name = NULL;
    private $surname = NULL;
    private $mail = NULL;
    private $rank = NULL;
    private $pp = NULL;
    private $message = NULL;
    private $chan = NULL;


    public function tableau_utilisateurs()
    {
        $i = 0;
        $this->connect();
        $request = "SELECT id,login,name,surname,mail FROM user";
        $query = mysqli_query($this->connexion,$request);
        $fetch = mysqli_fetch_all($query);
        ?>
            <table>
                <tbody>
                        <tr>
                        <th>ID</th>    
                        <th>Login</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Mail</th>
                        </tr>
        <?php
       foreach($fetch as list($id,$login,$name,$surname,$mail))
       {
        
            ?>
             
          
                       <td><?php echo  $id; ?></td>
                       <td><?php echo  $login; ?></td> 
                       <td><?php echo  $name; ?></td>
                       <td><?php echo  $surname;  ?></td>
                       <td><?php echo  $mail; ?></td>
                       <td><a href="fiche_membre.php?id=<?php echo $id ?>">Profil</</td>
                       
                       
       
                       <tr>
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       </tr> 
          
           
       <?php
       }
       $i++
       ?>
           
           </tbody> 
            </table>
        <?php
    }


}
?>