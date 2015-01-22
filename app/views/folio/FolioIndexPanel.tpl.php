<div class="row">
  <div class="col-lg-6 page-header">
    <h1>Folios<small><i class="icon-double-angle-right"></i></small></h1>
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group" style="float:right">
		<?php $_CONTROL->strBuscar->Render(); ?>  		
		<?php $_CONTROL->btnBuscar->Render(); ?>
  	</div>    
  </div><!-- /.col-lg-6 -->

</div><!-- /.row -->

	<?php $_CONTROL->dtgFolios->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render('CssClass="btn btn-yellow"'); ?></p>
	<?php 
			if ($_CONTROL->pnlEditFolio) {
				$_CONTROL->pnlEditFolio->Render();
				} 
	?>
