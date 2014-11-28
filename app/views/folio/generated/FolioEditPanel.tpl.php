<?php
	// This is the HTML template include file (.tpl.php) for folioEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
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
		<?php $_CONTROL->txtDireccion->RenderWithName(); ?>
		<?php $_CONTROL->txtNumExpedientes->RenderWithName(); ?>
		<?php $_CONTROL->txtGeom->RenderWithName(); ?>
		<?php $_CONTROL->txtJudicializado->RenderWithName(); ?>
		<?php $_CONTROL->lstCondicionesSocioUrbanisticasAsId->RenderWithName(); ?>

		<?php $_CONTROL->lstRegularizacionAsId->RenderWithName(); ?>

		<?php $_CONTROL->lstUsoInterno->RenderWithName(); ?>


<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>