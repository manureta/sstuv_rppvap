<?php
	// This is the HTML template include file (.tpl.php) for uso_internoEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->txtInformeUrbanisticoFecha->RenderWithName(); ?>
		<?php $_CONTROL->chkMapeoPreliminar->RenderWithName(); ?>
		<?php $_CONTROL->chkNoCorrespondeInscripcion->RenderWithName(); ?>
		<?php $_CONTROL->txtResolucionInscripcionProvisoria->RenderWithName(); ?>
		<?php $_CONTROL->txtResolucionInscripcionDefinitiva->RenderWithName(); ?>
		<?php $_CONTROL->calRegularizacionFechaInicio->RenderWithName(); ?>
		<?php $_CONTROL->chkRegularizacionTienePlano->RenderWithName(); ?>
		<?php $_CONTROL->chkRegularizacionCircular10Catastro->RenderWithName(); ?>
		<?php $_CONTROL->lstRegularizacionAprobacionGeodesiaObject->RenderWithName(); ?>
		<?php $_CONTROL->txtRegularizacionRegistracion->RenderWithName(); ?>
		<?php $_CONTROL->lstRegularizacionEstadoProcesoObject->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>