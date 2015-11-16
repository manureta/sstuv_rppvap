<?php
	// This is the HTML template include file (.tpl.php) for ocupanteEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdHogarObject->RenderWithName(); ?>
		<?php $_CONTROL->txtApellido->RenderWithName(); ?>
		<?php $_CONTROL->txtNombres->RenderWithName(); ?>
		<?php $_CONTROL->calFechaNacimiento->RenderWithName(); ?>
		<?php $_CONTROL->txtEdad->RenderWithName(); ?>
		<?php $_CONTROL->txtEstadoCivil->RenderWithName(); ?>
		<?php $_CONTROL->txtDeOConQuien->RenderWithName(); ?>
		<?php $_CONTROL->txtOcupacion->RenderWithName(); ?>
		<?php $_CONTROL->txtIngreso->RenderWithName(); ?>
		<?php $_CONTROL->txtTipoDoc->RenderWithName(); ?>
		<?php $_CONTROL->txtDoc->RenderWithName(); ?>
		<?php $_CONTROL->txtNacionalidad->RenderWithName(); ?>
		<?php $_CONTROL->txtNyaMadre->RenderWithName(); ?>
		<?php $_CONTROL->txtNyaPadre->RenderWithName(); ?>
		<?php $_CONTROL->txtRelacionParentescoJefeHogar->RenderWithName(); ?>
		<?php $_CONTROL->chkReferente->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>