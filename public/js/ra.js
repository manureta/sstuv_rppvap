 var blnEncarga = false;
 var cuadernillo;
 var uriBackto = false;
 
 function calcularEstado(){
    if(cuadernillo != null)
    if(blnEncarga && cuadernillo.closed){
        qc.objLoadingPanel.style.display = 'block';
        if(uriBackto) {
            location.href = uriBackto;
        } else {
            location.reload(true);
        }
        return true;
    }
    
    setTimeout("calcularEstado()", 250);
    return false;
    
}