<page size="A4">
<h1 lang="es-ES" align="center">

    <div class="encabezado">
      <img src="assets/images/logo_certificado.jpg" width="100%">
    </div>
</h1>
<p lang="es-Es" align="center">
    <strong>CERTIFICADO DE ADJUDICACIÓN</strong>
</p>
<p lang="es-ES" align="center">
    <strong>BARRIO <?=strtoupper($this->objHogar->IdFolioObject->NombreBarrioOficial);?> – <?=strtoupper($this->objHogar->IdFolioObject->IdPartidoObject->Nombre);?></strong>
</p>
</br>
<p align="justify">
    <a name="_GoBack"></a>
La<strong> Subsecretaría Social de Tierras, Urbanismo y Vivienda</strong> del Ministerio de Infraestructura de la Provincia de Buenos Aires,
<strong>CERTIFICA</strong> que mediante Resolución Nº <strong><?=__NRO_RESOLUCION__;?></strong> del Ministerio de Infraestructura, el inmueble identificado catastralmente
    como Circ. <strong><?=$this->objHogar->Circ;?></strong>,
     Secc. <strong><?=$this->objHogar->Secc;?></strong>,
      Mz. <strong><?=$this->objHogar->Mz;?></strong>,
       Pc. <strong><?=$this->objHogar->Pc;?></strong>,
       sito en el barrio <?=$this->objHogar->IdFolioObject->NombreBarrioOficial;?> del Partido
de <?=$this->objHogar->IdFolioObject->IdPartidoObject->Nombre;?> ha sido adjudicado al Sr/Sra. <?=$this->ocupantes?> .
</p>
<p align="justify">
     <?=$this->tipo_adjudicacion;?> por lo cual los adjudicatarios deben cumplir con las obligaciones allí dispuestas bajo
    apercibimiento, en caso de incumplimiento, de dar de baja la adjudicación y readjudicar el inmueble a otros beneficiarios.
</p>
<p align="justify">
    En virtud de lo dispuesto en el citado Decreto el/los adjudicatario/s deberán continuar ocupando el inmueble adjudicado, en forma ininterrumpida, con
    destino a vivienda propia y de su grupo familiar, hasta un plazo mínimo de cinco años desde el otorgamiento de la escritura traslativa de dominio a su
    nombre.
</p>
<p align="justify">
El/los adjudicatario/s deberá/n abonar como precio total por la adquisición del inmueble adjudicado la suma de <strong><?=$this->objHogar->ValorLote?></strong>    <strong> </strong>en <strong><?=$this->objHogar->CantidadCuotas?></strong> cuotas mensuales y consecutivas de <strong> <?=$this->objHogar->ValorCuota?> </strong><strong> </strong>cada una.
</p>
<p align="justify">
    La escritura traslativa de dominio a favor del/os adjudicatario/s se otorgará ante Escribanía General de Gobierno.
</p>
<p align="justify">
    Se extiende el presente en la ciudad de La Plata, a los
</p>
</page>
