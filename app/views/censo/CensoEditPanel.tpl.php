
  <div class="well bs-component container">
		<div class="titulos">
			<label><i class="icon-chevron-right"> </i>Datos generales </label>
		</div>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->calFechaAlta->RenderWithName(); ?>
	  	<?php $_CONTROL->txtTelefono->RenderWithName(); ?>
	  	<?php $_CONTROL->txtDireccion->RenderWithName(); ?>
	    <?php $_CONTROL->txtTipoBeneficio->RenderWithName(); ?>

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
			<label><i class="icon-chevron-right"> </i>Referencias del lote </label>
		</div>
    	<?php $_CONTROL->txtFormaOcupacion->RenderWithName(); ?>
    	<?php $_CONTROL->txtFechaIngreso->RenderWithName(); ?>
    	<?php $_CONTROL->txtDocTerreno->RenderWithName(); ?>		
		<?php $_CONTROL->chkDeclaracionNoOcupacion->RenderWithName(); ?>
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
  </div>

</div>
