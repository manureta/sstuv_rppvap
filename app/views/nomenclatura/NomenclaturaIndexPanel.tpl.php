	<?php $_CONTROL->dtgNomenclaturas->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditNomenclatura) {
				$_CONTROL->pnlEditNomenclatura->Render();
				} 
	?>
