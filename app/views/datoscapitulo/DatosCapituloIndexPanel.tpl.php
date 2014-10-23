	<?php $_CONTROL->dtgDatosCapitulos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditDatosCapitulo) {
				$_CONTROL->pnlEditDatosCapitulo->Render();
				} 
	?>

