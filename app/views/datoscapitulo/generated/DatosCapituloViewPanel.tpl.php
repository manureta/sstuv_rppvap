<?php
	// This is the HTML template include file (.tpl.php) for datos_capituloViewPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
	<div id="FormLabels">
		<?php $_CONTROL->lblIdDatosCapitulo->RenderWithName(); ?>
		<?php $_CONTROL->lblIdDefinicionCapitulo->RenderWithName(); ?>
		<?php $_CONTROL->lblCEstado->RenderWithName(); ?>
		<?php $_CONTROL->lblIdDatosCuadernillo->RenderWithName(); ?>
        <?php $_CONTROL->btnEdit->Render(); ?>
	</div>
