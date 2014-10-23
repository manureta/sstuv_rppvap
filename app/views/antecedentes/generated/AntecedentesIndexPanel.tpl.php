	<?php $_CONTROL->dtgAntecedenteses->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditAntecedentes) {
				$_CONTROL->pnlEditAntecedentes->Render();
				} 
	?>
