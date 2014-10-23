	<?php $_CONTROL->dtgDatos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditDato) {
				$_CONTROL->pnlEditDato->Render();
				} 
	?>

