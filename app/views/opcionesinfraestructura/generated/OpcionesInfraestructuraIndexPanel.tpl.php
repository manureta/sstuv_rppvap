	<?php $_CONTROL->dtgOpcionesInfraestructuras->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditOpcionesInfraestructura) {
				$_CONTROL->pnlEditOpcionesInfraestructura->Render();
				} 
	?>
