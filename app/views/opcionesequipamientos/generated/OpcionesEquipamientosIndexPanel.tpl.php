	<?php $_CONTROL->dtgOpcionesEquipamientoses->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditOpcionesEquipamientos) {
				$_CONTROL->pnlEditOpcionesEquipamientos->Render();
				} 
	?>
