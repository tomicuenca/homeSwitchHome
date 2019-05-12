function validar(){
	var nombre, contraseña;

	nombre = document.getElementById('usuario');
	contraseña = document.getElementById('contraseña');

	if((nombre.value === "")){
		if( nombre.value === "")
			nombre.classList.add("bordeError");
		else
			nombre.classList.remove("bordeError");
		alert("Tienes que ingresar el codigo de acceso");
		return false;
	}
}