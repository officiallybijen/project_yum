function validateForm(){
	var error=0;
	var name=document.form.name.value;
	var email=document.form.email.value;
	var subject=document.form.subject.value;
	var details=document.form.details.value;

	var msg='';

	if(name.trim()==''){
		alert("Name field can't be left empty");
		error++;
	}else{
		if(name.length>20){
			alert('Length of your name is too long.');
			error++;
		}
	}

	if(email.trim()==''){
		alert("Email field can't be left empty");
		error++;
	}

	if(details.trim()==''){
		alert("Details field can't be left empty");
		error++;
	}else{
		if (details.length>500 && details.length<30) {}
			alert("Length of the details should be between 30 and 500.");
			error++;
		}	
	}


	if(error>0){
		return false;
	}
}






