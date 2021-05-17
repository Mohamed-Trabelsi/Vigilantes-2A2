function EnvoyerE()
{
var a=0;
var b=0;
var c=0;

  var  nom = document.getElementById('nom').value;
  var  dateD = document.getElementById('dateD').value;
  var  dateF = document.getElementById('dateF').value;
  var  nb = document.getElementById('nb_participant').value;

  if(nom.charAt(0) !== nom.charAt(0).toUpperCase())
  {a=1;
       alert("Nom doit commancer par une majuscule!");

  }
    else {a=0;}  



 if( dateF <= dateD)
  {b=1;
       alert("Date Debut doit etre avant Date Fin!");

  }
  else {b=0;}  
 



if( nb > 500)
  {c=1;
       alert("Nombre de participants doit etre moins que 500!");

  }
  else {c=0;}  

    
if ((a==0) && (b==0) && (c==0) )
 { 
 	document.getElementById('theForm').submit();
 }



}