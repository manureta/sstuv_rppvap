	<?php $_CONTROL->dtgArchivosAdjuntoses->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditArchivosAdjuntos) {
				$_CONTROL->pnlEditArchivosAdjuntos->Render();
				} 
	?>
