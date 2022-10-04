function login() {
	// Write source code    
	var password = "nicetauren";

	while(true){
		var input = prompt("Input the password")
		if(input != password){
			alert("Wrong")
		}else{
			alert("Pass")
			break;
		}
	}
}

function initial() {
	// Write source code
	var yo = prompt("Input from Mon to Sun")

	document.write(yo)
}