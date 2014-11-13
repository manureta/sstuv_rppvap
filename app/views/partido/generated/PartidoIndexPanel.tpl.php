	<?php $_CONTROL->dtgPartidos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditPartido) {
				$_CONTROL->pnlEditPartido->Render();
				} 
	?>
