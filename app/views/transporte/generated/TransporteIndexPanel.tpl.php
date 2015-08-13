	<?php $_CONTROL->dtgTransportes->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditTransporte) {
				$_CONTROL->pnlEditTransporte->Render();
				} 
	?>
