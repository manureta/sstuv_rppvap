	<?php $_CONTROL->dtgDatoStrings->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditDatoString) {
				$_CONTROL->pnlEditDatoString->Render();
				} 
	?>
