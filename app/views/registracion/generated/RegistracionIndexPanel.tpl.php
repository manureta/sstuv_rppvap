	<?php $_CONTROL->dtgRegistraciones->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditRegistracion) {
				$_CONTROL->pnlEditRegistracion->Render();
				} 
	?>
