<style>
		.resultado{ background-color:#FeFeFe;min-height:380px;}
		.header{background: none repeat scroll 0 0; margin-left:5px;}
		.resultado div {border: none;float: left; margin: 0px;}
		.dato {float:left; padding:5px; border: 1px blue;font-style: italic;line-height:22px;font-weight: bold;}
		.dato .header {line-height:24px; font-weight:normal}
		.banner {width:100%;background-color:#FFFFFF}
		#logo { //background-image:url('http://190.188.234.6/registro/assets/images/logo_izquierda.png');
			background-color:#f58030;width:150px;height:50px;backgound-repeat:none; -webkit-print-color-adjust: exact;}
		#titulo {float:right;min-width:50%;text-align:right;}
		#titulo p{font-size:12px;margin:1px;padding:1px;}
		#titulo h3{margin:2px;padding:2px;}
		h2 {width:100%;text-align:center;display:inline-block;font-size:14px;}
			#consulta {padding:10px;float:none;background-color:#EEEEEE;position: absolute;margin:2px}
			#consulta .container {background-color:#FFFFFF; float:none}
			#consulta .separator {min-height:2px; background-color: gray;width: 100%;}
		</style>


        <div class="container titulos">
          <i class="icon-chevron-right"> </i>
          Consultar al tripartito por nomenclatura catastral:
        </div>
          <div class="well bs-component container">
            <form method="POST" action="<?=__VIRTUAL_DIRECTORY__?>/page/tripartito">
              <div>
                  <label>Partido:</label>
                  <input name="partidoN" type="text" tipo="numero" size="3"/>
                  <label>Circunscripción:</label>
                  <input name="circunscripcionN" type="text" tipo="texto" size="2"/>
                  <label>Sección:</label>
                  <input name="seccionN" type="text" tipo="texto" size="2"/>
                  <label>Chacra:</label>
                  <input name="chacraNN" type="text" tipo="numero" size="4"/><input name="chacraTN" type="text" tipo="texto" size="3"/>
                  <label>Quinta:</label>
                  <input name="quintaNN" type="text" tipo="numero" size="4"/><input name="quintaTN" type="text" tipo="texto" size="3"/>
                  <label>Fracción:</label>
                  <input name="fraccionNN" type="text" tipo="numero" size="4"/><input name="fraccionTN" type="text" tipo="texto" size="3"/>
                  <label>Manzana:</label>
                  <input name="manzanaNN" type="text" tipo="numero" size="4"/><input name="manzanaTN" type="text" tipo="texto" size="3"/>
                  <label>Parcela:</label>
                  <input name="parcelaNN" type="text" tipo="numero" size="4"/><input name="parcelaTN" type="text" tipo="texto" size="3"/>
                  <label>SubParcela:</label>
                  <input name="subparcelaN" type="text" tipo="numero" size="6"/>
                  <input type=hidden name=type value="html" ></input>
                  <input type=submit value=Consultar></input>
              </div>
            </form>
         </div>

       <div class="container titulos">
         <i class="icon-chevron-right"> </i>
         Consultar al tripartito por partido-partida:
       </div>
      <div class="well bs-component container">
        <form  method="POST" action="<?=__VIRTUAL_DIRECTORY__?>/page/tripartito">
              <label>Partido:</label><input name=partido type=text lenght=4 ></input>
              <label>Partida:</label><input name=partida type=text lenght=40 ></input>
              <input type=hidden name=type value="html" ></input>
              <input type=submit value=Consultar></input>
        </form>
      </div>
              <input type=button onclick="javascript:window.print();" value=Print />

      <div class="resultado">
        <?= $_CONTROL->contenido ;?>
     </div>
