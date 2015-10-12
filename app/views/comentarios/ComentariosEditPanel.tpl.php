
<div class="well bs-component container">


		<?php $_CONTROL->lstIdFolioObject->RenderWithName(); ?>

		<?php $_CONTROL->lstIdUsuarioObject->RenderWithName(); ?>

		<?php $_CONTROL->txtComentario->RenderWithName(); ?>

</div>

<div class="container info">
	 <span class="icon-exclamation-sign" aria-hidden="true"></span>
	  Fecha: <b><?php echo $_CONTROL->calFechaCreacion->DateTime; ?></b>
		<br/>
		<span class="icon-exclamation-sign" aria-hidden="true"></span>
		Última modificación: <b><?php echo $_CONTROL->calFechaModificacion->DateTime; ?></b>
</div>
