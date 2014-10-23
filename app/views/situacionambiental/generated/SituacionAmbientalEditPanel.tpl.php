<?php
	// This is the HTML template include file (.tpl.php) for situacion_ambientalEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->chkSinProblemas->RenderWithName(); ?>
		<?php $_CONTROL->chkReservaElectroducto->RenderWithName(); ?>
		<?php $_CONTROL->chkInundable->RenderWithName(); ?>
		<?php $_CONTROL->chkSobreTerraplenFerroviario->RenderWithName(); ?>
		<?php $_CONTROL->chkSobreCaminoSirga->RenderWithName(); ?>
		<?php $_CONTROL->chkExpuestoContaminacionIndustrial->RenderWithName(); ?>
		<?php $_CONTROL->chkSobreSueloDegradado->RenderWithName(); ?>
		<?php $_CONTROL->txtOtro->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>