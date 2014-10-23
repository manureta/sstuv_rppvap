	<?php $_CONTROL->dtgOpcionesTransportes->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditOpcionesTransporte) {
				$_CONTROL->pnlEditOpcionesTransporte->Render();
				} 
	?>
