<?php
	// This is the HTML template include file (.tpl.php) for comentariosEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
		<?php $_CONTROL->lblId->RenderWithName(); ?>
		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>
		<?php $_CONTROL->lstIdUsuarioObject->RenderWithName(); ?>
		<?php $_CONTROL->calFechaCreacion->RenderWithName(); ?>
		<?php $_CONTROL->calFechaModificacion->RenderWithName(); ?>
		<?php $_CONTROL->txtComentario->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>