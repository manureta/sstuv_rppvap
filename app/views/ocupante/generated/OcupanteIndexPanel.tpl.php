	<?php $_CONTROL->dtgOcupantes->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditOcupante) {
				$_CONTROL->pnlEditOcupante->Render();
				} 
	?>
