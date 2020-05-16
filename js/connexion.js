window.onload=function(){
document.forms["connexion"].addEventListener("submit", function(evenement) { 
    var erreur= document.getElementById("erreur");

   if (document.getElementsByName("login").value == "") {
       evenement.preventDefault();
       erreur.innerHTML="Login Obligatoire !";
       document.getElementByName("login").focus();
   }
   else if (document.getElementsByName("login").value.length > 25) {
       evenement.preventDefault();
       erreur.innerHTML="25 Caracteres Max";
       document.getElementByName("login").focus();
   }
   else if (document.getElementsByName("psw").value == "") {
       evenement.preventDefault();
       erreur.innerHTML="Password Obligatoire !";
       document.getElementByName("psw").focus();
   }
   else if (document.getElementByName("psw").value.lengts < 5) {
       evenement.preventDefault();
       erreur.innerHTML="5 characteres min!";
       document.getElementByName("psw").focus();
   }
 
});
}