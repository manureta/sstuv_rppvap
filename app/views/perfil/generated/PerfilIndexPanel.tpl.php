	<?php $_CONTROL->dtgPerfiles->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditPerfil) {
				$_CONTROL->pnlEditPerfil->Render();
				} 
	?>
