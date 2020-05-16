window.onload=function(){

    document.forms["inscription"].addEventListener("submit", function(evenement) { 
         var erreur= document.getElementById("erreur");

        if (document.getElementById("login").value == "") {
            evenement.preventDefault();
            erreur.innerHTML="Login Obligatoire !";
            document.getElementById("login").focus();
        }
        else if (document.getElementById("login").value.length > 25) {
            evenement.preventDefault();
            erreur.innerHTML="25 Caracteres Max";
            document.getElementById("login").focus();
        }
        else if (document.getElementById("name").value == "") {
            evenement.preventDefault();
            erreur.innerHTML="Prénom Obligatoire !";
            document.getElementById("name").focus();
        }
        else if (document.getElementById("name").value.length > 25) {
            evenement.preventDefault();
            erreur.innerHTML="25 Caracteres Max";
            document.getElementById("name").focus();
        }
        else if (document.getElementById("surname").value == "") {
            evenement.preventDefault();
            erreur.innerHTML="Nom Obligatoire !";
            document.getElementById("surname").focus();
        }
        else if (document.getElementById("surname").value.length > 25) {
            evenement.preventDefault();
            erreur.innerHTML="25 Caracteres Max";
            document.getElementById("surname").focus();
        }
       
        else if (document.getElementById("mail").value == "") {
            evenement.preventDefault();
           erreur.innerHTML="Mail Obligatoire";
            document.getElementById("mail").focus();
        }
        else if (document.getElementById("mail").value.indexOf("@")===-1) {
            evenement.preventDefault();
           erreur.innerHTML="Adresse invalide";
            document.getElementById("mail").focus();
        }
        
        else if (document.getElementById("psw").value == "") {
            evenement.preventDefault();
            erreur.innerHTML="Password Obligatoire !";
            document.getElementById("psw").focus();
        }
        else if (document.getElementById("psw").value.lengts < 5) {
            evenement.preventDefault();
            erreur.innerHTML="Mdp trop court !";
            document.getElementById("psw").focus();
        }
        else if (document.getElementById("confpsw").value.lengts < 5) {
            evenement.preventDefault();
            erreur.innerHTML="confirmation trop courte !";
            document.getElementById("psw").focus();

        }
        else if (document.getElementById("psw").value != ("confpsw").value) {
            evenement.preventDefault();
            erreur.innerHTML="Non identique!";
            document.getElementById("psw").focus();
        }
    });


 

/*

-------------------------v1-------------------------
//traitement sur un input selectionner par id 
    document.getElementById("login").addEventListener("input",function (login){
    var paragrapheErreur = document.getElementById("erreur");
        login.preventDefault();
    
    
    if(this.value == ''){
        paragrapheErreur.innerHTML="Login Obligatoire !";
        
    }
    else if(this.value.length > 25){
        paragrapheErreur.innerHTML="Pas de login à rallonge stp ( 25 caracteres MAX ! )!";
        
    }
    else if(/[&!?/\+=_;:,$*()<>§@\#\".]/.test(this.value)){
        paragrapheErreur.innerHTML="Pas de caracteres spéciaux!";
        
    }
    else{
        //faire pop un "done"
        paragrapheErreur.innerHTML="";
    }
    
    
});

-----------------------------------------------------------------





















    --------v2--------
    //traitement sur un input selectionner par id 
    document.getElementById("login").addEventListener("input",function (login){
       
        var paragrapheErreur = document.getElementById("erreur");
        
    
    if(this.value == ''){
        paragrapheErreur.innerHTML="Login Obligatoire !";
        
    }
    else if(this.value.length > 25){
        paragrapheErreur.innerHTML="Pas de login à rallonge stp ( 25 caracteres MAX ! )!";
        
    }
    else if(/[&!?/\+=_;:,$*()<>§@\#\".]/.test(this.value)){
        paragrapheErreur.innerHTML="Pas de caracteres spéciaux!";
        
    }
    else if (paragrapheErreur) {
		login.preventDefault();
		return false;
	} else {
		alert('Formulaire envoyé !');
    }
});*/





















/*
    document.getElementById("name").addEventListener("input",function (name){
       
        var paragrapheErreur = document.getElementById("erreur");
        
    
    if(this.value == ''){
        paragrapheErreur.innerHTML="Prenom Obligatoire !";
        
    }
    else if(this.value.length > 25){
        paragrapheErreur.innerHTML="25 caracteres max !";
        
    }
    else if(/[&!?/\+=_;:,$*()<>§@\#\".]/.test(this.value)){
        paragrapheErreur.innerHTML="Pas de caracteres spéciaux!";
        
    }
    else if (paragrapheErreur) {
		name.preventDefault();
		return false;
	} else {
		alert('Formulaire envoyé !');
    }

});  

document.getElementById("surname").addEventListener("input",function (surname){
       
    var paragrapheErreur = document.getElementById("erreur");
    

if(this.value == ''){
    paragrapheErreur.innerHTML="Nom Obligatoire !";
    
}
else if(this.value.length > 25){
    paragrapheErreur.innerHTML="25 caracteres max !";
    
}
else if(/[&!?/\+=_;:,$*()<>§@\#\".]/.test(this.value)){
    paragrapheErreur.innerHTML="Pas de caracteres spéciaux!";
    
}
else if (paragrapheErreur) {
   surname.preventDefault();
    return false;
} else {
    alert('Formulaire envoyé !');
}

});  

  */
}


















      