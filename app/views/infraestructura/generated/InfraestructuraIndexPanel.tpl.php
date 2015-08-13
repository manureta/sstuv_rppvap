	<?php $_CONTROL->dtgInfraestructuras->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditInfraestructura) {
				$_CONTROL->pnlEditInfraestructura->Render();
				} 
	?>
