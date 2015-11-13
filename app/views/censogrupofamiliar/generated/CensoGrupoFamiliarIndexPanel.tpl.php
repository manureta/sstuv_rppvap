	<?php $_CONTROL->dtgCensoGrupoFamiliares->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditCensoGrupoFamiliar) {
				$_CONTROL->pnlEditCensoGrupoFamiliar->Render();
				} 
	?>
