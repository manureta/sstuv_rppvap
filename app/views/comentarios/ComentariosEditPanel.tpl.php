
<div class="well bs-component container">


		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>

		<?php $_CONTROL->lstIdUsuarioObject->RenderWithName(); ?>

		<?php $_CONTROL->txtComentario->RenderWithName(); ?>

</div>

<div class="container info">
	 <span class="icon-exclamation-sign" aria-hidden="true"></span>
		última modificación: <?php echo $_CONTROL->calFechaModificacion->DateTime ?>
</div>
