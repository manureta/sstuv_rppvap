	<?php $_CONTROL->dtgUsuarios->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditUsuario) {
				$_CONTROL->pnlEditUsuario->Render();
				} 
	?>
