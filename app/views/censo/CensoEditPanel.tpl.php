
  <div class="well bs-component container">
		<div class="titulos">
			<label><i class="icon-chevron-right"> </i>Datos generales </label>
		</div>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->calFechaAlta->RenderWithName(); ?>
	  	<?php $_CONTROL->txtTelefono->RenderWithName(); ?>
	  	<?php $_CONTROL->txtDireccion->RenderWithName(); ?>
	    <?php $_CONTROL->lstTipoBeneficio->RenderWithName(); ?>

	</div>

	<div class="well bs-component container">
		<div class="titulos">
			<label><i class="icon-chevron-right"> </i>Datos Catastrales </label>
		</div>
			<?php $_CONTROL->txtCirc->RenderWithName(); ?>
		  <?php $_CONTROL->txtSecc->RenderWithName(); ?>
		  <?php $_CONTROL->txtMz->RenderWithName(); ?>
		  <?php $_CONTROL->txtPc->RenderWithName(); ?>

	</div>

  <div class="well bs-component container">
    <div class="titulos">
      <label><i class="icon-chevron-right"> </i>Valor del lote </label>
    </div>
    <?php $_CONTROL->txtValorLote->RenderWithName(); ?>
    <?php $_CONTROL->txtCantidadCuotas->RenderWithName(); ?>
    <?php $_CONTROL->txtValorCuota->RenderWithName(); ?>
  </div>

  <div class="well bs-component container">
		<div class="titulos">
			<label><i class="icon-chevron-right"> </i>Referencias del lote </label>
		</div>
    	<?php $_CONTROL->txtFormaOcupacion->RenderWithName(); ?>
    	<?php $_CONTROL->txtFechaIngreso->RenderWithName(); ?>
    	<?php $_CONTROL->txtDocTerreno->RenderWithName(); ?>
		<?php $_CONTROL->chkDeclaracionNoOcupacion->RenderWithName(); ?>
    <?php $_CONTROL->btnCertificado->RenderWithName(); ?>
	</div>

<div class="well bs-component container">
  <div class="titulos">
    <label><i class="icon-chevron-right"> </i>Ocupantes del lote </label>
  </div>
  <div class="renderWithName">
      <div class="left">
          <label></label>
      </div>
      <?php $_CONTROL->lstOcupanteAsId->Render(); ?>
      <div class="alert alert-danger" role="alert">
         <span class="icon-exclamation-sign" aria-hidden="true"></span>
         Los cambios de los ocupantes serán guardados cuando se guarden los cambios del "Grupo Familiar"
      </div>
  </div>

</div>

<div class="well bs-component container">
  <?php if(Permission::PuedeEditarCenso()){ ?>
  <div class="well bs-component">
      <div class="container">

          <span class="btn btn-success fileinput-button">
              <i class="icon-plus"></i>
              <span>Adjuntar (No Funciona)...</span>
              <!-- The file input field used as target for the file upload widget -->
              <input id="fileupload_censo" type="file" name="files[]" multiple>
          </span>
          <br>
          <br>
          <!-- The global progress bar -->
          <div id="progress" class="progress">
              <div class="progress-bar progress-bar-success"></div>
          </div>
          <!-- The container for the uploaded files -->
          <div id="files_censo" class="files"></div>
          <br>
      </div>
  </div>
  <?php } else {?>
  <div class="titulos"><i class="icon-chevron-right"></i>Archivos Adjuntos</div>
  <div>
      <div class="well bs-component">
          <div id="files_censo" class="files"></div>
      </div>
  </div>
  <?php } ?>
</div>
