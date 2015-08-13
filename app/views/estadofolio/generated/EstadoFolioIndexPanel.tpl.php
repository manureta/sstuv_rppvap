	<?php $_CONTROL->dtgEstadoFolios->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditEstadoFolio) {
				$_CONTROL->pnlEditEstadoFolio->Render();
				} 
	?>
