

<?php $_CONTROL->txtApellido->RenderWithName(); ?>
<?php $_CONTROL->txtNombres->RenderWithName(); ?>
<?php $_CONTROL->calFechaNacimiento->RenderWithName(); ?>
<?php $_CONTROL->txtEdad->RenderWithName(); ?>
<div class="renderWithName">
    <div class="left">
        <label>Estado civil </label>
    </div>
    <?php $_CONTROL->lstEstadoCivil->Render(); ?>
    <?php $_CONTROL->txtDeOConQuien->Render(); ?>
</div>
<div class="renderWithName">
    <div class="left">
        <label>Ocupación </label>
    </div>
    <?php $_CONTROL->lstOcupacion->Render(); ?>
    <?php $_CONTROL->txtIngreso->Render(); ?>
</div>
<?php $_CONTROL->lstTipoDocumento->RenderWithName(); ?>
<?php $_CONTROL->txtDoc->RenderWithName(); ?>
<?php $_CONTROL->txtNacionalidad->RenderWithName(); ?>
<?php $_CONTROL->txtNyaMadre->RenderWithName(); ?>
<?php $_CONTROL->txtNyaPadre->RenderWithName(); ?>
<?php $_CONTROL->chkActivo->RenderWithName(); ?>

<div class="botones-form">
<?php $_CONTROL->pnlButtons->Render(); ?>
</div>
