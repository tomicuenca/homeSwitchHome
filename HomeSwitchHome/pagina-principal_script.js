function verificar(){
	var cod = document.getElementById('ingCod').value;
	if(cod != '123456'){
		alert('Código incorrecto');
		return false;
	}
	else{
		return true;
	}
}
