<?php $_CONTROL->objWaitIcon->Render(); ?>
<div id="QFLSelector">
    <div id="QFLButtons">
        <?php $_CONTROL->lnkFilters->Render(); ?>
        <?php $_CONTROL->lnkColumns->Render(); ?>
    </div>
    <div id="QFLPanels">
        <?php $_CONTROL->pnlFilters->Render(); ?>
        <?php $_CONTROL->pnlColumns->Render(); ?>
        <?php //$_CONTROL->btnAplicarColumnas->Render(); ?>
    </div>
</div>

<?php if ($_CONTROL->GetFilterListFilterActivos()) : ?>
<div class="QFLFiltros">
        <?php $intCant = 1; ?>
        <?php foreach ($_CONTROL->GetFilterListFilterActivos() as $objFilterListFilter) : ?>
            <?php //echo "<p style=\"font-size: 10px;\">".$_CONTROL->GetRemoveFilterButtonByName($objFilterListFilter->ControlId)->Render(false)." <strong>" . $objFilterListFilter . "</strong> "/*.$_CONTROL->GetFiltroOperador($idx)->Render(false)." '". $_CONTROL->GetFiltroText($idx) ."'&nbsp;"; $_CONTROL->GetFiltroButton($idx)->Render()*/; echo '</p>'; ?>
            <div class="filtroBox" title="<?= $objFilterListFilter?>"><?= $objFilterListFilter->ShortToString()?><?=$_CONTROL->GetRemoveFilterButtonByName($objFilterListFilter->ControlId)->Render(false)?></div>
            <?php $intCant++; ?>
        <?php endforeach; ?>
</div>
<?php endif; ?>
<div class="QFLandOrCondition">
    <?php $_CONTROL->lstAndOrCondition->Render(); ?>
</div>

<?php $_CONTROL->pnlFilterPanel->Render(); ?>