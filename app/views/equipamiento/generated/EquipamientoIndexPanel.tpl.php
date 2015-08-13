	<?php $_CONTROL->dtgEquipamientos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditEquipamiento) {
				$_CONTROL->pnlEditEquipamiento->Render();
				} 
	?>
