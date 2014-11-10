
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->txtCodFolio->RenderWithName(); ?>
		<?php $_CONTROL->lstIdPartidoObject->RenderWithName(); ?>
		<?php $_CONTROL->lstIdLocalidadObject->RenderWithName(); ?>
		<?php $_CONTROL->txtMatricula->RenderWithName(); ?>
		<?php $_CONTROL->calFecha->RenderWithName(); ?>
		<?php $_CONTROL->txtEncargado->RenderWithName(); ?>
		<?php $_CONTROL->txtNombreBarrioOficial->RenderWithName(); ?>
		<?php $_CONTROL->txtNombreBarrioAlternativo1->RenderWithName(); ?>
		<?php $_CONTROL->txtNombreBarrioAlternativo2->RenderWithName(); ?>
		<?php $_CONTROL->txtAnioOrigen->RenderWithName(); ?>
		<?php $_CONTROL->txtSuperficie->RenderWithName(); ?>
		<?php $_CONTROL->txtCantidadFamilias->RenderWithName(); ?>
		<?php $_CONTROL->lstTipoBarrioObject->RenderWithName(); ?>
		<?php $_CONTROL->txtObservacionCasoDudoso->RenderWithName(); ?>
		<?php $_CONTROL->txtJudicializado->RenderWithName(); ?>
		<?php $_CONTROL->txtDireccion->RenderWithName(); ?>
		<?php $_CONTROL->txtNumExpedientes->RenderWithName(); ?>
		<?php $_CONTROL->lstCondicionesSocioUrbanisticasAsId->RenderWithName(); ?>

		<?php $_CONTROL->lstRegularizacionAsId->RenderWithName(); ?>

		<?php $_CONTROL->lstUsoInterno->RenderWithName(); ?>


<div id="botones" class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>

<div id="myModal" class="modal">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Map</h4>
        </div>
        <div class="modal-body">
          <div class="modal-body" id="map-canvas"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
        </div>
      </div>
    </div>
</div>

