//XXX FIXME ARREGLAR ESTA BASOFIA
function esNro(expresion){
	var exp = parseInt(expresion);
	return (exp!=NaN && exp == expresion);
}


// COMMENT Ahora cuando se escribe otra cosa que no sea numero, no vuelve a cero, deja vacio el campo, o como estaba
function solonumeros(obj,cantDecimales) {
	if (obj.value=="") return;
	if(cantDecimales){
		if (obj.value=='.') { obj.value='.'; return }
		cantDecimales = parseInt(cantDecimales);
		var regex = traerRegex(cantDecimales);
		var esDecimal = regex.test(obj.value);
		if(!esDecimal){
			//si tiene otra cosa que no sea ni Numero ni punto
			obj.value=obj.value.replace(/[^0-9\.]+/,"");
			//Si tiene 2 puntos simples
			while(obj.value.indexOf(".")<obj.value.lastIndexOf("."))
				obj.value=obj.value.substring(0,obj.value.lastIndexOf("."));
			//Si tiene masdecimales que los configurados
			if(obj.value.length - 1 - obj.value.lastIndexOf(".")>cantDecimales)
				obj.value=obj.value.substring(0,obj.value.length - 1);
			obj.value = (obj.value<0)?(obj.value * -1):(obj.value );
		}else{
			//Si acaba de poner un punto espero un seg a ver si lo completa.
			//si despues del segundo, la exp sigue igual borro el ultimo punto
			if(obj.value.indexOf(".")==(obj.value.length - 1)||obj.value.lastIndexOf("0")==(obj.value.length - 1))
				setTimeout("setearNro('" + obj.id + "')",2000);
			else
				obj.value = (obj.value<0)?(obj.value * -1):(obj.value );
		}
	}else{
		obj.value=obj.value.replace(/[^0-9\.]+/,"");
		while(obj.value.indexOf(".")<obj.value.lastIndexOf("."))
			obj.value=obj.value.substring(0,obj.value.lastIndexOf("."));
		obj.value = (obj.value<0)?(obj.value * -1):(obj.value);
	}

	if (obj.value=='.') { obj.value='.'; return }
	if (obj.value=='') { obj.value=''; return }
}

function setearNro(e){
	var obj = $(e);
	obj.value = (obj.value<0)?(obj.value * -1):(obj.value * 1);
}

function traerRegex(cantDecimales){
	switch(cantDecimales){
	case 1:
		return /^(\d+\.\d{0,1}|\d+)$/;
	case 2:
		return /^(\d+\.\d{0,2}|\d+)$/;
	case 3:
		return /^(\d+\.\d{0,3}|\d+)$/;
	case 4:
		return /^(\d+\.\d{0,4}|\d+)$/;
	case 5:
		return /^(\d+\.\d{0,5}|\d+)$/;
	case 6:
		return /^(\d+\.\d{0,6}|\d+)$/;
	case 7:
		return /^(\d+\.\d{0,7}|\d+)$/;
	case 8:
		return /^(\d+\.\d{0,8}|\d+)$/;
	case 9:
		return /^(\d+\.\d{0,9}|\d+)$/;
	case 10:
		return /^(\d+\.\d{0,10}|\d+)$/;


	}
}

