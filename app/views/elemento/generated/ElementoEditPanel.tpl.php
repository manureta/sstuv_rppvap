<?php
	// This is the HTML template include file (.tpl.php) for elementoEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblIdElemento->RenderWithName(); ?>
		<?php $_CONTROL->txtNombre->RenderWithName(); ?>
		<?php $_CONTROL->lstIdPerfilObject->RenderWithName(); ?>
		<?php $_CONTROL->txtUndato->RenderWithName(); ?>
		<?php $_CONTROL->txtOtrodato->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>