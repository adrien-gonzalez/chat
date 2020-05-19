window.onload=function(){
document.forms["connexion"].addEventListener("submit", function(evenement) { 
    var erreur= document.getElementById("erreur");

   if (document.getElementsByName("login").value == "") {
       evenement.preventDefault();
       erreur.innerHTML="Login Obligatoire !";
       document.getElementByName("login").focus();
   }
   else if (document.getElementsByName("psw").value == "") {
       evenement.preventDefault();
       erreur.innerHTML="Password Obligatoire !";
       document.getElementByName("psw").focus();
   }
    
});
}