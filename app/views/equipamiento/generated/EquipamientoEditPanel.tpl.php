<?php
	// This is the HTML template include file (.tpl.php) for equipamientoEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->lstUnidadSanitariaObject->RenderWithName(); ?>
		<?php $_CONTROL->lstJardinInfantesObject->RenderWithName(); ?>
		<?php $_CONTROL->lstEscuelaPrimariaObject->RenderWithName(); ?>
		<?php $_CONTROL->lstEscuelaSecundariaObject->RenderWithName(); ?>
		<?php $_CONTROL->lstComedorObject->RenderWithName(); ?>
		<?php $_CONTROL->lstSalonUsosMultiplesObject->RenderWithName(); ?>
		<?php $_CONTROL->lstCentroIntegracionComunitariaObject->RenderWithName(); ?>
		<?php $_CONTROL->txtOtro->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>