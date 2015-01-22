
  <div class="page-header">
    <h1>Folios<small><i class="icon-double-angle-right"></i></small></h1>
  </div><!-- /.col-lg-6 -->

	<?php $_CONTROL->dtgFolios->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="btn btn-yellow"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditFolio) {
				$_CONTROL->pnlEditFolio->Render();
				} 
	?>
