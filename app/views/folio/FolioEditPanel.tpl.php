<form id="example-form" action="#">
    <div>
        <h3>Datos Generales</h3>
		<section>
		<?php $_CONTROL->txtCodFolio->RenderWithName(); ?>
		<?php $_CONTROL->lstIdPartidoObject->RenderWithName(); ?>
		<?php $_CONTROL->lstIdLocalidadObject->RenderWithName(); ?>
		<?php $_CONTROL->txtMatricula->RenderWithName(); ?>
		
		<?php $_CONTROL->txtEncargado->RenderWithName(); ?>
		<?php $_CONTROL->txtNombreBarrioOficial->RenderWithName(); ?>
		<?php $_CONTROL->txtNombreBarrioAlternativo1->RenderWithName(); ?>
		<?php $_CONTROL->txtNombreBarrioAlternativo2->RenderWithName(); ?>
		<?php $_CONTROL->txtAnioOrigen->RenderWithName(); ?>
		<?php $_CONTROL->txtSuperficie->RenderWithName(); ?>
		<?php $_CONTROL->txtCantidadFamilias->RenderWithName(); ?>
		<?php $_CONTROL->lstTipoBarrioObject->RenderWithName(); ?>
		<?php $_CONTROL->txtObservacionCasoDudoso->RenderWithName(); ?>
		<?php $_CONTROL->txtJudicializado->RenderWithName(); ?>
		<?php $_CONTROL->txtDireccion->RenderWithName(); ?>
		<?php $_CONTROL->txtNumExpedientes->RenderWithName(); ?>
		</section>
		<h3>Nomenclatura</h3>
		<section></section>

		<h3>Cond. Socio-Urbanisticas</h3>
		<section></section>
	</div>
</form>		
		

<div id="botones" class="botones-form">
<?php $_CONTROL->btnSave->Render(); ?>
<?php $_CONTROL->btnCancel->Render(); ?>
<?php $_CONTROL->btnDelete->Render(); ?>
</div>



