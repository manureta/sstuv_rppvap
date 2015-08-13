<?php
	// This is the HTML template include file (.tpl.php) for infraestructuraEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->lstEnergiaElectricaMedidorIndividualObject->RenderWithName(); ?>
		<?php $_CONTROL->lstEnergiaElectricaMedidorColectivoObject->RenderWithName(); ?>
		<?php $_CONTROL->lstAlumbradoPublicoObject->RenderWithName(); ?>
		<?php $_CONTROL->lstAguaCorrienteObject->RenderWithName(); ?>
		<?php $_CONTROL->lstAguaPotableObject->RenderWithName(); ?>
		<?php $_CONTROL->lstRedCloacalObject->RenderWithName(); ?>
		<?php $_CONTROL->lstSistAlternativoEliminacionExcretasObject->RenderWithName(); ?>
		<?php $_CONTROL->lstRedGasObject->RenderWithName(); ?>
		<?php $_CONTROL->lstPavimentoObject->RenderWithName(); ?>
		<?php $_CONTROL->lstCordonCunetaObject->RenderWithName(); ?>
		<?php $_CONTROL->lstDesaguesPluvialesObject->RenderWithName(); ?>
		<?php $_CONTROL->lstRecoleccionResiduosObject->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>