<?php
	// This is the HTML template include file (.tpl.php) for organismos_de_intervencionEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->chkNacional->RenderWithName(); ?>
		<?php $_CONTROL->chkProvincial->RenderWithName(); ?>
		<?php $_CONTROL->chkMunicipal->RenderWithName(); ?>
		<?php $_CONTROL->calFechaIntervencion->RenderWithName(); ?>
		<?php $_CONTROL->txtProgramas->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>