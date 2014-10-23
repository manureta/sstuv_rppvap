	<?php $_CONTROL->dtgLocalidades->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditLocalidad) {
				$_CONTROL->pnlEditLocalidad->Render();
				} 
	?>
