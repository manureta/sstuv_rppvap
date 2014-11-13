<?php
	// This is the HTML template include file (.tpl.php) for encuadre_legalEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->chkDecreto222595->RenderWithName(); ?>
		<?php $_CONTROL->chkLey24374->RenderWithName(); ?>
		<?php $_CONTROL->chkDecreto81588->RenderWithName(); ?>
		<?php $_CONTROL->chkLey23073->RenderWithName(); ?>
		<?php $_CONTROL->chkDecreto468696->RenderWithName(); ?>
		<?php $_CONTROL->txtExpropiacion->RenderWithName(); ?>
		<?php $_CONTROL->txtOtros->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>