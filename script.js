function delete_admin(){
    if(confirm("Tu veux vraiment delete ?")){
        id=$_GET["id"];
        window.location.href="delete.php?id="+$id;
        return true;
    }
}