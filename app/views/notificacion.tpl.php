<page size="A4">
<p>

    <div class="encabezado">
      <img src="assets/images/logo_certificado.jpg" width="100%">
    </div>
</p>
<p lang="es-ES" align="center">
    <strong>NOTIFICACIÓN DE ADJUDICACIÓN </strong>
</h1>
<p lang="es-ES" align="center">
      <strong>BARRIO <?=strtoupper($this->objHogar->IdFolioObject->NombreBarrioOficial);?> – <?=strtoupper($this->objHogar->IdFolioObject->IdPartidoObject->Nombre);?></strong>
</p>
</br>
<p align="justify">
    En la localidad de <?=$this->objHogar->IdFolioObject->NombreBarrioOficial;?> a los <?=__FECHA_NOTIFICACION__;?> me notifico de la Resolución N° <strong><?=__NRO_RESOLUCION__;?></strong> dictada por el
    Ministro de Infraestructura de la Provincia de Buenos Aires por la cual se adjudica el inmueble identificado catastralmente como Circ.
    <strong><?=$this->objHogar->Circ;?></strong>,
    Secc. <strong><?=$this->objHogar->Secc;?></strong>,
       Manz.<strong><?=$this->objHogar->Mz;?></strong>,
          Parcela <strong><?=$this->objHogar->Pc;?></strong>,
           según plano <strong><?=__NRO_PLANO__;?></strong> del barrio <?=$this->objHogar->IdFolioObject->NombreBarrioOficial;?> – Partido de
  <?=$this->objHogar->IdFolioObject->IdPartidoObject->Nombre;?> recibiendo copia de la misma.
</p>
<p align="justify">
    Asimismo declaro conocer la situación del inmueble que se me adjudica. Para el supuesto de resultar sucesor a título individual o universal de un anterior
    adjudicatario, manifiesto exonerar a la Provincia de cualquier responsabilidad por evicción en los términos de los artículos 2098, 2100, 2101, 2106 y
    concordantes del Código Civil manteniendo a la Provincia indemne frente a cualquier acción de terceros que se funden en los boletos de compraventa
    anteriormente otorgados y/o rescindidos. <sup><sup>1</sup></sup>
</p>

<br/>
<br/>

   <?php
     $ind=0;
    for ($i=1; $i <= ceil((count($this->firmas)/2)); $i++) {

   ?>

    <p align="center">
    <div style="float:left; margin-left:15%;">
        <?php
          echo $this->firmas[$ind]["firma"];
          $ind++;
        ?>
    </div>

    <div style="float:right; margin-right:15%;">
       <?php
        echo $this->firmas[$ind]["firma"];
        $ind++;
       ?>
     </div>

    </p>
  </br>
  </br>
  </br>
  <?php } ?>


<div id="sdfootnote1">
    <p lang="es-ES" align="justify">
        1
        <em>
            El art. 2098 del Código Civil textualmente expresa.” Las partes sin embargo pueden aumentar, disminuir, o suprimir la obligación que nace de la
            evicción.”
        </em>
    </p>
    <p lang="es-ES" align="justify">
        <em>
            El art. 2100 del Código Civil textualmente expresa:” La exclusión o renuncia de cualquier responsabilidad , no exime de la responsabilidad por la
            evicción, y el vencido tendrá derecho a repetir el precio que pagó al enajenante, aunque no los daños e intereses.”
        </em>
    </p>
    <p lang="es-ES" align="justify">
        <em>El art. 2101 del Código Civil textualmente establece: “Exceptúense de la disposición del artículo anterior, los casos siguientes:</em>
    </p>
    <p lang="es-ES" align="justify">
        <em>
            1° Si el enajenante expresamente excluyó su responsabilidad de restituir el precio; o si el adquirente renunció expresamente el derecho de
            repetirlo;
        </em>
    </p>
    <p lang="es-ES" align="justify">
        <em> 2° Si la enajenación fue a riesgo del adquirente;</em>
    </p>
    <p lang="es-ES" align="justify">
        <em>
            3° Si cuando hizo la adquisición , sabía el adquirente, o debía saber, el peligro de que sucediese la evicción, y sin embargo renunció a la
            responsabilidad del enajenante, o consintió en que ella se excluyese.
        </em>
    </p>
    <p lang="es-ES" align="justify">
        <em>
            El art. 2106 del Código Civil textualmente expresa.” Cuando el adquirente de cualquier modo conocía el peligro de la evicción antes de la
            adquisición, nada puede reclamar del enajenante por los efectos de la evicción que suceda, a no ser que ésta hubiere sido expresamente convenida.
        </em>
    </p>
</div>
</page>
