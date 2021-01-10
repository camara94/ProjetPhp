
function formControlle(name, nameError) {
	var inp1 = document.getElementById(name);
	var divmsg = document.getElementById(nameError);

	var valeur = false;

	inp1.addEventListener('keydown', (e)=>{
		if(inp1.value.length < 2) {
			divmsg.innerText="le champs " + inp1.id + " est requis *"
			divmsg.style.color="red";
			divmsg.style.fontStyle="italic";
		} else {
			divmsg.innerText="";
			
		}
	});
    
    if(inp1.value.length < 2) {
    	valeur = false;
    } else {
    	valeur = true;
    }

	return valeur;
}

document.body.addEventListener('change', (e)=>{
	if( 
		   formControlle('nom', 'nom-error') 
		&& formControlle('prenom', 'prenom-error') 
		&& formControlle('mail', 'mail-error') 
		&& formControlle('telephone', 'telephone-error')
		&& formControlle('password', 'password-error') 
		&& formControlle('fonction', 'fonction-error')
		&& formControlle('confirmation', 'confirmation-error')
	) {
		console.log("okjudsyugsdsuidihsud==============");
		document.getElementById("btn").disabled=false;
	}
})

