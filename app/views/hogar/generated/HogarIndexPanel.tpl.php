	<?php $_CONTROL->dtgHogares->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditHogar) {
				$_CONTROL->pnlEditHogar->Render();
				} 
	?>
