	<?php $_CONTROL->dtgOpcionesEstadoExpropiaciones->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditOpcionesEstadoExpropiacion) {
				$_CONTROL->pnlEditOpcionesEstadoExpropiacion->Render();
				} 
	?>
