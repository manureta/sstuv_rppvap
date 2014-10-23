	<?php $_CONTROL->dtgElementoHijos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditElementoHijo) {
				$_CONTROL->pnlEditElementoHijo->Render();
				} 
	?>
