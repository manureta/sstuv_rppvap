	<?php $_CONTROL->dtgCensoPersonas->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditCensoPersona) {
				$_CONTROL->pnlEditCensoPersona->Render();
				} 
	?>
