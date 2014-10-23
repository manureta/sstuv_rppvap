<?php
	// This is the HTML template include file (.tpl.php) for datoViewresumenPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
	<div id="FormLabels">
		<?php $_CONTROL->lblIdDato->RenderWithName(); ?>
		<?php $_CONTROL->lblIdCampo->RenderWithName(); ?>
		<?php $_CONTROL->lblIdPersonal->RenderWithName(); ?>
		<?php $_CONTROL->lblIdDesignacion->RenderWithName(); ?>
		<?php $_CONTROL->lblValor->RenderWithName(); ?>
		<?php $_CONTROL->lblFechaModificacion->RenderWithName(); ?>
        <?php $_CONTROL->btnEdit->Render(); ?>
	</div>
