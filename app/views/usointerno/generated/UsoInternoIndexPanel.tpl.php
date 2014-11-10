	<?php $_CONTROL->dtgUsoInternos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditUsoInterno) {
				$_CONTROL->pnlEditUsoInterno->Render();
				} 
	?>
