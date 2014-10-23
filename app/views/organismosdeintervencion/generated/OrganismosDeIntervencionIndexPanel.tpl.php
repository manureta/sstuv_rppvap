	<?php $_CONTROL->dtgOrganismosDeIntervenciones->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditOrganismosDeIntervencion) {
				$_CONTROL->pnlEditOrganismosDeIntervencion->Render();
				} 
	?>
