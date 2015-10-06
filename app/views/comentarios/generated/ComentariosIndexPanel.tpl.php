	<?php $_CONTROL->dtgComentarioses->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditComentarios) {
				$_CONTROL->pnlEditComentarios->Render();
				} 
	?>
