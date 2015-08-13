	<?php $_CONTROL->dtgEncuadreLegales->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditEncuadreLegal) {
				$_CONTROL->pnlEditEncuadreLegal->Render();
				} 
	?>
