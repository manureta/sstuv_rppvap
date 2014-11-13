	<?php $_CONTROL->dtgAprobacionGeodesias->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditAprobacionGeodesia) {
				$_CONTROL->pnlEditAprobacionGeodesia->Render();
				} 
	?>
