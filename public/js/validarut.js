function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
	rut.value = cuerpo + '-'+ dv
	if(cuerpo.length == 7){
		alert("ingrese el rut con su numero verificador");
		rut.className = "form-control is-invalid";
	}else{
    
	// Si no cumple con el mínimo ej. (n.nnn.nnn)
	if(cuerpo.length < 8 || cuerpo.lengt > 9) {
		alert("RUT Incompleto");
		rut.value = '';
		rut.className = "form-control is-invalid";
}else{
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
	if(dvEsperado != dv) { 
	alert("RUT Inválido"); 
	rut.value = '';
	rut.className = "form-control is-invalid";
}else{
	rut.className = "form-control"
}
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
	rut.setCustomValidity('');
}
}
}
function validar(){
	checkRut(document.getElementById("rut"));
}
function phonee(){
	telefono = document.getElementById("telefono");
    phone = telefono.value;
    if(tiene_numeros(phone,phone) == 1){
        alert("el telefono solo debe contener numeros")
        telefono.className = "form-control is-invalid";
    }else{
	if(phone.substring(0,4) != '+569'){
        telefono.value = '+569'+phone;
        telefono.className = "form-control";
    }
}
}
var numeros="0123456789+";
function tiene_numeros(texto,nombre){
    for(i=0; i<texto.length; i++){
       if (numeros.indexOf(texto.charAt(i),0)==-1){
          return 1;
       }
    }
    return 0;
 }
