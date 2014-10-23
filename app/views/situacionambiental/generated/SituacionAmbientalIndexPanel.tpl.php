	<?php $_CONTROL->dtgSituacionAmbientales->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditSituacionAmbiental) {
				$_CONTROL->pnlEditSituacionAmbiental->Render();
				} 
	?>
