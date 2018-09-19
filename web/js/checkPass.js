alert("Check pass is there Amigoo Hosana :D ");

function checkPassword(str)
{
  // au moins un chiffre, une minuscule et une majuscule 
  // au moins 6 caractères qui sont des lettres, nombres ou underscore
  var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
  return re.test(str);
}

function checkForm(form)
{
/*
  if(form.username.value == "") {
    alert("Error: Username cannot be blank!");
    form.username.focus();
    return false;
  }
  re = /^\w+$/;
  if(!re.test(form.username.value)) {
    alert("Error: Username must contain only letters, numbers and underscores!");
    form.username.focus();
    return false;
  }
*/


  if(form.mdp.value != "" && form.mdp.value == form.mdp_conf.value) {
    if(!checkPassword(form.mdp.value)) {
      alert("ERREUR : Le mot de passe entré n'est pas valide!");
      form.mdp.focus();
      return false;
    }
  } 
  else 
  {
    alert("ERREUR : S'il vous plait vérifiez que vous avez bien entré et vérifié votre mot de passe !");
    form.mdp.focus();
    return false;
  }

  return true;
}