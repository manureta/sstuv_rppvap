	<?php $_CONTROL->dtgEvolucionFolios->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditEvolucionFolio) {
				$_CONTROL->pnlEditEvolucionFolio->Render();
				} 
	?>
