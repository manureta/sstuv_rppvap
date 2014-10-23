<h1>Visor de sucesos (logs)</h1>
<style>
    div.renderWithName div.right {
        font-size: 10px;
        overflow:scroll;
        width: 734px;
        height: 200px;
        line-height:0.5em;
    }
    div.renderWithName div.left {
        font-size: 12px;
        font-weight: bolder;
    }
</style>

<?php $_CONTROL->lblCommon->RenderWithName(); ?>
<?php $_CONTROL->lblDebug->RenderWithName(); ?>
<?php $_CONTROL->lblError->RenderWithName(); ?>
