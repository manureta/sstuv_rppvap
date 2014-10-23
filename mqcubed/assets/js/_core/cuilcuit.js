// 0123456789012
// xx-yyyyyyyy-z
function MaskCuilCuit(obj){
    obj.value = obj.value.replace(/[^0-9-]+/,"");
    obj.value = obj.value.substr(0,2).replace(/[^0-9]+/,"") + obj.value.charAt(2) + obj.value.substr(3,8).replace(/[^0-9]+/,"") + obj.value.substr(11,2);

    switch(obj.value.length){
        case 1:
            switch(obj.value){
                case '2':
                case '3':
                    return;
                default:
                    obj.value = '';
                    return;
            }
        case 2:
            switch(obj.value.substr(0,2)){
                case '21':
                case '22':
                case '25':
                case '26':
                case '28':
                case '29':
                    obj.value = '2';
                    return;
                case '31':
                case '32':
                case '34':
                case '35':
                case '36':
                case '37':
                case '38':
                case '39':
                    obj.value = '3';
                    return;
                case '20':
                case '23':
                case '24':
                case '27':
                case '30':
                case '33':
                    return;
                default:
                    obj.value = '';
                    return;
            }
        case 3:
            if(obj.value.charAt(2)!='-')
                obj.value = obj.value.substr(0,2) + '-' + obj.value.charAt(2);
            return;
        case 12:
            if(obj.value.charAt(11)!='-')
                obj.value = obj.value.substr(0,11) + '-' + obj.value.charAt(11);
    }    
}

function ValidateCuilCuit(obj){
    obj.value = obj.value.replace(/[^0-9-]+/,"");
    blnError = false;
    if (obj.value && obj.value.length == 13){
        if(obj.value.charAt(2)!='-' || obj.value.charAt(11)!='-' )
            blnError = true;
        else{
            switch(obj.value.substr(0,2)){
                case '20':
                case '23':
                case '24':
                case '27':
                case '30':
                case '33':
                    var aMult = '54-32765432';
                    var aMult = aMult.split('');            
                    aCUIT = obj.value.split('');
                    var iResult = 0;
                    for(i = 0; i <= 10; i++){
                        if(i==2)
                            continue;
                        iResult += parseInt(aCUIT[i]) * parseInt(aMult[i]);                        
                    }
                    iResult = (iResult % 11);
                    iResult = 11 - iResult;

                    if (iResult == 11) iResult = 0;
                    if (iResult == 10) iResult = 9;

                    if (iResult == parseInt(aCUIT[12]))                    
                        blnError = false;
                    else
                        blnError = true;
                    break;                    
                default:
                    blnError = true;
            }
        }
    }
    else
        blnError =true;
        
    if(blnError)
        $('#'+arguments[0].id).addClass("danger-textbox");
    else
        $('#'+arguments[0].id).removeClass("danger-textbox");
} 