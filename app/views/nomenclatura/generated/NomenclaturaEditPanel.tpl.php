<?php
	// This is the HTML template include file (.tpl.php) for nomenclaturaEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->txtPartidaInmobiliaria->RenderWithName(); ?>
		<?php $_CONTROL->txtTitularDominio->RenderWithName(); ?>
		<?php $_CONTROL->txtCirc->RenderWithName(); ?>
		<?php $_CONTROL->txtSecc->RenderWithName(); ?>
		<?php $_CONTROL->txtChacQuinta->RenderWithName(); ?>
		<?php $_CONTROL->txtFrac->RenderWithName(); ?>
		<?php $_CONTROL->txtMza->RenderWithName(); ?>
		<?php $_CONTROL->txtParc->RenderWithName(); ?>
		<?php $_CONTROL->txtInscripcionDominio->RenderWithName(); ?>
		<?php $_CONTROL->txtTitularRegPropiedad->RenderWithName(); ?>
		<?php $_CONTROL->txtPartido->RenderWithName(); ?>
		<?php $_CONTROL->chkDatoVerificadoRegPropiedad->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>