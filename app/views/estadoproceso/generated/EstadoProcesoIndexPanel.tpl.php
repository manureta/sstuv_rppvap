	<?php $_CONTROL->dtgEstadoProcesos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditEstadoProceso) {
				$_CONTROL->pnlEditEstadoProceso->Render();
				} 
	?>
