<?php
	// This is the HTML template include file (.tpl.php) for conflicto_habitacionalEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->chkIntervinoArea->RenderWithName(); ?>
		<?php $_CONTROL->txtFueroInterviniente->RenderWithName(); ?>
		<?php $_CONTROL->txtJuzgadoInterviniente->RenderWithName(); ?>
		<?php $_CONTROL->txtCaratulaExpediente->RenderWithName(); ?>
		<?php $_CONTROL->chkMinisterioDesarrollo->RenderWithName(); ?>
		<?php $_CONTROL->txtMinisterioDesarrolloReferente->RenderWithName(); ?>
		<?php $_CONTROL->chkDefensorPueblo->RenderWithName(); ?>
		<?php $_CONTROL->txtDefensorPuebloReferente->RenderWithName(); ?>
		<?php $_CONTROL->chkSecretariaNacional->RenderWithName(); ?>
		<?php $_CONTROL->txtSecretariaNacionalReferente->RenderWithName(); ?>
		<?php $_CONTROL->chkMunicipalidad->RenderWithName(); ?>
		<?php $_CONTROL->txtMunicipalidadReferente->RenderWithName(); ?>
		<?php $_CONTROL->chkOrganizacionBarrial->RenderWithName(); ?>
		<?php $_CONTROL->txtOrganizacionBarrialReferente->RenderWithName(); ?>
		<?php $_CONTROL->txtOtrosOrganismos->RenderWithName(); ?>
		<?php $_CONTROL->chkOrdenDesalojo->RenderWithName(); ?>
		<?php $_CONTROL->txtFechaEjecucion->RenderWithName(); ?>
		<?php $_CONTROL->chkSuspensionHecho->RenderWithName(); ?>
		<?php $_CONTROL->chkSolicitudSuspension->RenderWithName(); ?>
		<?php $_CONTROL->txtFechaSuspension->RenderWithName(); ?>
		<?php $_CONTROL->txtDuracionSuspension->RenderWithName(); ?>
		<?php $_CONTROL->chkMesaGestion->RenderWithName(); ?>
		<?php $_CONTROL->txtObservaciones->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>