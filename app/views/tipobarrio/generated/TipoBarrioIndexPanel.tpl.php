	<?php $_CONTROL->dtgTipoBarrios->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditTipoBarrio) {
				$_CONTROL->pnlEditTipoBarrio->Render();
				} 
	?>
