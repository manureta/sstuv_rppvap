<?php
	// This is the HTML template include file (.tpl.php) for censo_grupo_familiarEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblCensoGrupoFamiliarId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->calFechaAlta->RenderWithName(); ?>
		<?php $_CONTROL->txtCirc->RenderWithName(); ?>
		<?php $_CONTROL->txtSecc->RenderWithName(); ?>
		<?php $_CONTROL->txtMz->RenderWithName(); ?>
		<?php $_CONTROL->txtPc->RenderWithName(); ?>
		<?php $_CONTROL->txtTelefono->RenderWithName(); ?>
		<?php $_CONTROL->chkDeclaracionNoOcupacion->RenderWithName(); ?>
		<?php $_CONTROL->txtTipoDocAdj->RenderWithName(); ?>
		<?php $_CONTROL->txtTipoBeneficio->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>