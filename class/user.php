<?php

class user extends bdd{

    private $id = NULL;
    private $login = NULL;
    private $name = NULL;
    private $surname = NULL;
    private $mail = NULL;
    private $rank = NULL;
    private $pp = NULL;
    private $message = NULL;
    
    

//Fonctions inscription/connexion/déconnexion/désinscription.

    public function inscription($login,$name,$surname,$mail,$psw,$confpsw){
        if($login != NULL  && $name != NULL && $surname != NULL && $mail != NULL && $psw != NULL && $confpsw != NULL){
            if($psw == $confpsw){
                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $mail)){
                    
                
                $this->connect();
                $requete = "SELECT login,mail FROM user WHERE login = '$login' OR mail = '$mail'";
                $query = mysqli_query($this->connexion,$requete);
                $result = mysqli_fetch_all($query);

                if(empty($result)){
                    $this->connect();
                    $psw = password_hash($psw, PASSWORD_BCRYPT, array('cost' => 5));
                    $requete = "INSERT INTO `user`(`login`,`name`, `surname`, `mail`,`password`,`rank`) VALUES ('$login','$name','$surname','$mail','$psw','membre')";
                    $query = mysqli_query($this->connexion,$requete);
                    echo "ok";
                    
                    /*
                    if ($query) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " .   "<br>" .  mysqli_error($connect);
                     
                    }
                }
            */}
                else{
                    echo "log"; 
                }
            }
            else{ 
                echo "mail";
            }
        }
            else{
                echo "psw";
            }
        }
        else{
            echo "empty";
        }
    }





public function connexion($login,$psw){
        $this->connect();
        $request = "SELECT * FROM user WHERE login = '$login'";
        $query = mysqli_query($this->connexion,$request);
        $result = mysqli_fetch_assoc($query);
        if(!empty($result)){
            if($login == $result["login"]){
                if(password_verify($psw,$result["password"])){
                    $this->id = $result["id"];
                    $this->login = $result["login"];
                    $this->name= $result["name"];
                    $this->surname= $result["surname"];
                    $this->mail= $result["mail"];
                    $this->rank= $result["rank"];
                    return [$this->id,$this->login,$this->name,$this->surname,$this->mail,$this->rank];
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }



public function isConnected(){
        if ($this->login != null) {
            return true;
        } else {
            return false;
        }
    }


public function disconnect(){
        $this->id = NULL;
        $this->login = NULL;
        $this->name = NULL;
        $this->surname = NULL;
        $this->mail = NULL;
        $this->rank = NULL;
    }

public function desinscription()
    {
        $this->connect();
        $id = $_SESSION["user"]->getid();
        $delete="DELETE * FROM user WHERE id = $id";
        $query=mysqli_query($this->connexion,$delete);
                session_unset();
                session_destroy();
                header ('location:index.php');
    }

//----------------------------------------------------------------------------------//
//Function du profil 

public function mes_info()
{   
    $this->connect();
    $fetch=$this->execute("SELECT login,mail FROM user WHERE id = $this->id");

    ?>
        <table>
            <tbody>
                <tr>
                    <th>Login</th>
                    <th>Mail</th>
                </tr>
    <?php
   foreach($fetch as list($login,$mail))
   {
    
        ?>
                <tr>
                   <td><?php echo $login; ?></td> 
                   <td><?php echo $mail; ?></td>
                </tr>
   <?php
   }
   ?>
            </tbody> 
        </table>
    <?php
}





//----------------------------------------------------------------------------------//
//Get
public function getid(){
    return $this->id;
}

public function getlogin(){
    return $this->login;
}

public function getname(){
    return $this->name;
}

public function getsurname(){
    return $this->surname;
}

public function getmail(){
    return $this->mail;
}

public function getrank(){
    return $this->rank;
}

}