<?php
	// This is the HTML template include file (.tpl.php) for dato_integerEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblIdDatoInteger->RenderWithName(); ?>
		<?php $_CONTROL->lstIdCampoObject->RenderWithName(); ?>
		<?php $_CONTROL->lstIdPersonalObject->RenderWithName(); ?>
		<?php $_CONTROL->lstIdDesignacionObject->RenderWithName(); ?>
		<?php $_CONTROL->txtValor->RenderWithName(); ?>
		<?php $_CONTROL->calFechaModificacion->RenderWithName(); ?>
	</div>

	<div id="formActionsM">
		<div id="save"><?php $_CONTROL->btnSave->Render('CssClass="button savebuttonM"'); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render('CssClass="button cancelbuttonM"'); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render('CssClass="button deletebuttonM"'); ?></div>
	</div>