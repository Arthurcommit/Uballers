var prenom = document.getElementById('firstname');
var miss_prenom = document.getElementById('missprenom');
var verif_prenom = new RegExp("^[a-zA-ZÀ-ÖØ-öø-ÿœŒ]");

var nom = document.getElementById('lastname');
var miss_nom = document.getElementById('missnom');
var verif_nom = new RegExp("^[a-zA-ZÀ-ÖØ-öø-ÿœŒ]");

var mail = document.getElementById('mail');
var miss_mail = document.getElementById('missmail');
var verif_mail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

var confirm_mail = document.getElementById('confirm_mail');
var missconfirm_mail = document.getElementById('missconfirm_mail');
var verif_confirmmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

var mdp = document.getElementById('mdp');
var miss_mdp = document.getElementById('missmdp');

var date = document.getElementById('date');
var miss_date = document.getElementById('missdate');





var formValid = document.getElementById('btninscription');
formValid.addEventListener('click', validation);



function validation(event)
{
    console.log ("test")

if(prenom.value==""){
     
    event.preventDefault(); //Pour bloquer l'envoi du formulaire */
    miss_prenom.style.color ='red' // Le missprenom doit être défini en span id dans HTML 
    miss_prenom.textContent='Prénom manquant'; /*Pour afficher "prénom manquant", il faut créer une span id dans HTML, 

    et reporter le même nom dans JS.*/
}  

else if (verif_prenom.test(prenom.value)==false){
    event.preventDefault(); 
    miss_prenom.style.color = 'red'
    miss_prenom.textContent='Entrez votre prénom en toutes lettres';    
}   

if(nom.value==""){
    event.preventDefault(); 
    miss_nom.style.color ='red'
    miss_nom.textContent='Nom manquant';
}
else if (verif_nom.test(prenom.value)==false){
    event.preventDefault(); 
    miss_nom.style.color = 'red'
    miss_nom.textContent='Entrez votre nom en toutes lettres';    
}  


if(mail.value==""){
    event.preventDefault(); 
    miss_mail.style.color ='red'
    miss_mail.textContent='Mail manquant';  
}
else if (verif_mail.test(mail.value)==false){
    event.preventDefault(); 
    miss_mail.style.color = 'red'
    miss_mail.textContent='Entrez une adresse mail valide svp';    
} 

if(mail.value==""){
    event.preventDefault(); 
    miss_mail.style.color ='red'
    miss_mail.textContent='Mail manquant';  
}
else if (verif_mail.test(mail.value)==false){
    event.preventDefault(); 
    miss_mail.style.color = 'red'
    miss_mail.textContent='Entrez une adresse mail valide svp';    
} 

if(confirm_mail.value==""){
    event.preventDefault(); 
    missconfirm_mail.style.color ='red'
    missconfirm_mail.textContent='Adresse email de confirmation manquante'; 
}
else if (verif_confirmmail.test(confirm_mail.value)==false){
    event.preventDefault(); 
    missconfirm_mail.style.color ='red'
    missconfirm_mail.textContent='Entrez une adresse mail valide svp';
} 
if(mdp.value==""){
    event.preventDefault(); 
    miss_mdp.style.color ='red'
    miss_mdp.textContent='Mot de passe manquant';  
}

if(day.value==""){
    event.preventDefault(); 
    miss_date.style.color ='red'
    miss_date.textContent='Veuillez choisir un jour de naissance';
    
}

if(month.value==""){
    event.preventDefault(); 
    miss_date.style.color ='red'
    miss_date.textContent='Veuillez choisir un mois de naissance';
    
}

if(year.value==""){
    event.preventDefault(); 
    miss_date.style.color ='red'
    miss_date.textContent='Veuillez choisir une année de naissance';
    
}








}
