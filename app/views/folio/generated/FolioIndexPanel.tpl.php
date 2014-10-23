	<?php $_CONTROL->dtgFolios->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditFolio) {
				$_CONTROL->pnlEditFolio->Render();
				} 
	?>
