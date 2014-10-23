<h2>Registración de personal en el sistema</h2>
<div id="help-button"><?php if (!$_CONTROL->btnAyuda->Rendered) $_CONTROL->btnAyuda->Render(); ?></div>
<hr>
<?php //$_CONTROL->txtLocalizacion->RenderWithName(); ?>
<?php //$_CONTROL->lstIdPerfil->RenderWithName(); ?>
<?php $_CONTROL->txtDni->RenderWithName(); ?>
<?php $_CONTROL->txtCuit->RenderWithName(); ?>
<?php $_CONTROL->txtNombre->RenderWithName(); ?>
<?php $_CONTROL->txtApellido->RenderWithName(); ?>
<?php $_CONTROL->txtEmail->RenderWithName(); ?>
<?php $_CONTROL->txtEmailAgain->RenderWithName(); ?>
<?php $_CONTROL->txtTelefonoCodArea->RenderWithName(); ?>
<?php $_CONTROL->txtTelefono->RenderWithName(); ?>
<?php $_CONTROL->txtPassword->RenderWithName(); ?>
<?php $_CONTROL->txtPasswordAgain->RenderWithName(); ?>

<?php $_CONTROL->lstPregunta1->RenderWithName(); ?>
<?php $_CONTROL->txtRespuestaA->RenderWithName(); ?>
<?php $_CONTROL->lstPregunta2->RenderWithName(); ?>
<?php $_CONTROL->txtRespuestaB->RenderWithName(); ?>
<?php $_CONTROL->txtCaptcha->RenderWithName(); ?><br><br>
<br>
<div id="botones-form" align="center">
    <?php $_CONTROL->btnVolver->Render(); ?>
    <?php $_CONTROL->btnRegistrar->Render(); ?>
</div>
