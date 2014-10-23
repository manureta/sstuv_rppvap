	<?php $_CONTROL->dtgRegularizaciones->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditRegularizacion) {
				$_CONTROL->pnlEditRegularizacion->Render();
				} 
	?>
