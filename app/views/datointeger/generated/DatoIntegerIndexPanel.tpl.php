	<?php $_CONTROL->dtgDatoIntegeres->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditDatoInteger) {
				$_CONTROL->pnlEditDatoInteger->Render();
				} 
	?>
