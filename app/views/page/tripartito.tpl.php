<style media="print">
body {font-size:12px}
.noprint {display:none;}
.breadcrumbs {display:none;}
#logo { background-image:url('img/logo_subse_byn.png')};
#logo { //background-image:url('http://190.188.234.6/registro/assets/images/logo_izquierda.png');
       background-color:#CCCCCC;width:150px;height:50px;backgound-repeat:none; -webkit-print-color-adjust: exact;}
#logo{display:none}
#logo_impresion {display:fixed}
   
</style>
<style>
		.resultado{ background-color:#FeFeFe;min-height:380px;}
		.header{background: none repeat scroll 0 0; margin-left:5px;}
		.resultado div {border: none;float: left; margin: 0px;}
		.dato {float:left; padding:5px; border: 1px blue;font-style: italic;line-height:22px;font-weight: bold;}
		.dato .header {line-height:24px; font-weight:normal}
		.banner {width:100%;background-color:#FFFFFF}
		#logo { //background-image:url('http://190.188.234.6/registro/assets/images/logo_izquierda.png');
			background-color:#f58030;width:150px;height:50px;backgound-repeat:none; -webkit-print-color-adjust: exact;}
		#logo_impresion{display:none}
		#titulo {float:right;min-width:50%;text-align:right;}
		#titulo p{font-size:12px;margin:1px;padding:1px;}
		#titulo h3{margin:2px;padding:2px;}
		h2 {width:100%;text-align:center;display:inline-block;font-size:14px;}
			#consulta {padding:10px;float:none;background-color:#EEEEEE;position: absolute;margin:2px}
			#consulta .container {background-color:#FFFFFF; float:none}
			#consulta .separator {min-height:2px; background-color: gray;width: 100%;}
		</style>
<script>
/*
$(
#inputmask({
            mask: "99:59:59",
            definitions: {'5': {validator: "[0-5]"}}
    });
);
*/
function  validateFormNomencla(){
	console.log(this);return false;

}
function validateFormPP(){
	console.log(this);
	return true;
}
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function completar_ceros(s,size) {
	while (s.length < size) s = "0" + s;
	return s;
}
function completar_espacios(s,size) {
	while (s.length < size) s =  s + " ";
	return s;
}
function partido(v){
 	v =v.replace(/\D/g,"");
 	v = completar_ceros(v,3); 
	v=v.substr(-3,3);
	return v;
}
function partida(v){
 	v =v.replace(/\D/g,"");
 	v = completar_ceros(v,6); 
	v=v.substr(-6,6);
	return v;
}
function circunscripcion(v){
 	v =v.replace(/\D/g,"");
 	v = completar_ceros(v,2); 
	v=v.substr(-2,2);
	return v;
}
function seccion(v){
	if(v.substr(-1,1)==' ' && v.length>2) {v=""}
	v=v.replace(/ /g,"");
	v = completar_espacios(v,2);
	v=v.substr(-2,2);
	return v;
}
function chacra(v){
 	v =v.replace(/\D/g,"");
 	v = completar_ceros(v,4); 
	v=v.substr(-4,4);
	return v;
}
function chacra_letra(v){
	if(v.substr(-1,1)==' ' && v.length>3) {v=""}
	v=v.replace(/ /g,"");
 	v = completar_espacios(v,3); 
	v=v.substr(-3,3);
	return v;
}
function quinta(v){
 	v =v.replace(/\D/g,"");
 	v = completar_ceros(v,4); 
	v=v.substr(-4,4);
	return v;
}
function quinta_letra(v){
	if(v.substr(-1,1)==' ' && v.length>3) {v=""}
	v=v.replace(/ /g,"");
 	v = completar_espacios(v,3); 
	v=v.substr(-3,3);
	return v;
}
function fraccion(v){
 	v =v.replace(/\D/g,"");
 	v = completar_ceros(v,4); 
	v=v.substr(-4,4);
	return v;
}
function fraccion_letra(v){
	if(v.substr(-1,1)==' ' && v.length>3) {v=""}
	v=v.replace(/ /g,"");
 	v = completar_espacios(v,3); 
	v=v.substr(-3,3);
	return v;
}
function manzana(v){
 	v =v.replace(/\D/g,"");
 	v = completar_ceros(v,4); 
	v=v.substr(-4,4);
	return v;
}
function manzana_letra(v){
	if(v.substr(-1,1)==' ' && v.length>3) {v=""}
	v=v.replace(/ /g,"");
 	v = completar_espacios(v,3); 
	v=v.substr(-3,3);
	return v;
}

function parcela(v){
 	v =v.replace(/\D/g,"");
 	v = completar_ceros(v,4); 
	v=v.substr(-4,4);
	return v;
}
function parcela_letra(v){
	if(v.substr(-1,1)==' ' && v.length>3) {v=""}
	v=v.replace(/ /g,"");
	v = completar_espacios(v,3);
	v=v.substr(-3,3);
	return v;
}
function subparcela(v){
	if(v.substr(-1,1)==' ' && v.length>6) {v=""}
	v=v.replace(/ /g,"");
//	v=v.replace(((-?\d+.\d+\s?-?\d+.\d+,?)+)+,"");
	v = completar_espacios(v,6);
	v=v.substr(-6,6);
	return v;
}
/*
jQuery(function($){
       $("#partidoN").mask("999");
       $("#circunscripcionN").mask("**");
       $("#seccionN").mask("**");
});
*/
</script>

        <div class="container titulos noprint">
          <i class="icon-chevron-right"> </i>
          Consultar al tripartito por nomenclatura catastral:
        </div>
          <div class="well bs-component container noprint">
            <form method="POST" action="<?=__VIRTUAL_DIRECTORY__?>/page/tripartito" >
              <div>
                  <label>Partido:</label>
                  <input id="partidoN" name="partidoN" type="text" tipo="numero" size="3" data-mask="000" onkeypress="mascara(this,partido)" />
                  <label>Circunscripción:</label>
                  <input name="circunscripcionN" type="text" tipo="texto" size="2" onkeypress="mascara(this,circunscripcion)"/>
                  <label>Sección:</label>
                  <input name="seccionN" type="text" tipo="texto" size="2" onkeypress="mascara(this,seccion)"/>
                  <label>Chacra:</label>
                  <input name="chacraNN" type="text" tipo="numero" size="4" onkeypress="mascara(this,chacra)"/><input name="chacraTN" type="text" tipo="texto" size="3" onkeypress="mascara(this,chacra_letra)"/>
                  <label>Quinta:</label>
                  <input name="quintaNN" type="text" tipo="numero" size="4" onkeypress="mascara(this,quinta)"/><input name="quintaTN" type="text" tipo="texto" size="3" onkeypress="mascara(this,quinta_letra)"/>
                  <label>Fracción:</label>
                  <input name="fraccionNN" type="text" tipo="numero" size="4" onkeypress="mascara(this,fraccion)"/><input name="fraccionTN" type="text" tipo="texto" size="3" onkeypress="mascara(this,fraccion_letra)"/>
                  <label>Manzana:</label>
                  <input name="manzanaNN" type="text" tipo="numero" size="4" onkeypress="mascara(this,manzana)"/><input name="manzanaTN" type="text" tipo="texto" size="3" onkeypress="mascara(this,manzana_letra)"/>
                  <label>Parcela:</label>
                  <input name="parcelaNN" type="text" tipo="numero" size="4"  onkeypress="mascara(this,parcela)"/><input name="parcelaTN" type="text" tipo="texto" size="3"  onkeypress="mascara(this,parcela_letra)"/>
                  <label>SubParcela:</label>
                  <input name="subparcelaN" type="text" tipo="numero" size="6" onkeypress="mascara(this,subparcela)"/>
                  <input type=hidden name=type value="html" />
                  <input type=submit value=Consultar />
              </div>
            </form>
         </div>

       <div class="container titulos noprint">
         <i class="icon-chevron-right"> </i>
         Consultar al tripartito por partido-partida:
       </div>
      <div class="well bs-component container noprint">
        <form  method="POST" action="<?=__VIRTUAL_DIRECTORY__?>/page/tripartito" >
              <label>Partido:</label><input name="partido" type="text" size="3" onkeypress="mascara(this,partido)" />
              <label>Partida:</label><input name="partida" type="text" size="6" onkeypress="mascara(this,partida)" />
              <input type=hidden name=type value="html" />
              <input type=submit value=Consultar />
        </form>
      </div>
              <input type=button onclick="javascript:window.print();" value=Print class="noprint"/>

      <div class="resultado">
        <?= $_CONTROL->contenido ;?>
     </div>
