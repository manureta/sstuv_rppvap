


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
                  <input type=submit value=Buscar></input>
              </div>
            </form>
         </div>

       <div class="container titulos">
         <i class="icon-chevron-right"> </i>
         Consultar al tripartito por partido-partida:
       </div>
      <div class="well bs-component container">
        <form id=consulta method="POST" action="<?=__VIRTUAL_DIRECTORY__?>/page/tripartito">
              <label>Partido:</label><input name=partido type=text lenght=4 ></input>
              <label>Partida:</label><input name=partida type=text lenght=40 ></input>
              <input type=hidden name=type value="html" ></input>
              <input type=submit value=Consultar></input>
              <input type=button onclick="javascript:window.print();" value=Print />
        </form>
      </div>

      <div class="container">
        <?= $_CONTROL->contenido ;?>
     </div>
