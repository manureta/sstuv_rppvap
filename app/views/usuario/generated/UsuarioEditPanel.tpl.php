<?php
	// This is the HTML template include file (.tpl.php) for usuarioEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblIdUsuario->RenderWithName(); ?>
		<?php $_CONTROL->txtPassword->RenderWithName(); ?>
		<?php $_CONTROL->txtEmail->RenderWithName(); ?>
		<?php $_CONTROL->chkSuperAdmin->RenderWithName(); ?>
		<?php $_CONTROL->calFechaActivacion->RenderWithName(); ?>
		<?php $_CONTROL->txtNombre->RenderWithName(); ?>
		<?php $_CONTROL->lstIdPerfilObject->RenderWithName(); ?>
		<?php $_CONTROL->txtRespuestaA->RenderWithName(); ?>
		<?php $_CONTROL->txtRespuestaB->RenderWithName(); ?>
		<?php $_CONTROL->txtPreguntaSecretaA->RenderWithName(); ?>
		<?php $_CONTROL->txtPreguntaSecretaB->RenderWithName(); ?>
		<?php $_CONTROL->txtCodPartido->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>