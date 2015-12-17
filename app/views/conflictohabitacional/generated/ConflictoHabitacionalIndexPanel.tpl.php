	<?php $_CONTROL->dtgConflictoHabitacionales->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="button createbuttonM"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditConflictoHabitacional) {
				$_CONTROL->pnlEditConflictoHabitacional->Render();
				} 
	?>
