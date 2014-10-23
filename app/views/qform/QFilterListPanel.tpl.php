<div id="filterpanel">
    <div id="middlefilterpanel">
        <?php if ($_CONTROL->FilterListFilter) : ?>
        <div style="margin-bottom: 10px;font-weight: bold;"><?php echo preg_replace('/Type$/', '', $_CONTROL->FilterListFilter->Nombre); ?></div>
        <?php endif; ?>
        <div style="display: inline; "><?php $_CONTROL->lstOperator->Render(); ?></div>
        <div style="display: inline; "><?php $_CONTROL->MixControl->Render(); ?></div>
        <div style="display: inline; "><?php $_CONTROL->btnFiltroButton->Render(); ?></div>
        <div style="text-align: center; margin-top: 5px;"><?php $_CONTROL->btnCloseButton->Render(); ?></div>
    </div>
</div>
