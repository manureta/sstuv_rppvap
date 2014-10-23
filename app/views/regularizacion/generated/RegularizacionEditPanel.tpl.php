<?php
	// This is the HTML template include file (.tpl.php) for regularizacionEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->chkProcesoIniciado->RenderWithName(); ?>
		<?php $_CONTROL->calFechaInicio->RenderWithName(); ?>
		<?php $_CONTROL->chkTienePlano->RenderWithName(); ?>
		<?php $_CONTROL->chkCircular10Catastro->RenderWithName(); ?>
		<?php $_CONTROL->lstAprobacionGeodesiaObject->RenderWithName(); ?>
		<?php $_CONTROL->txtRegistracion->RenderWithName(); ?>
		<?php $_CONTROL->lstEstadoProcesoObject->RenderWithName(); ?>
		<?php $_CONTROL->lstAntecedentesAsIdFolio->RenderWithName(); ?>


<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>