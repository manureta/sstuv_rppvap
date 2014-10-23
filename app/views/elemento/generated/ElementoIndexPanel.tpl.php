	<?php $_CONTROL->dtgElementos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditElemento) {
				$_CONTROL->pnlEditElemento->Render();
				} 
	?>
