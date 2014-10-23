<?php
foreach ($_CONTROL->objControlArray as $objControl) {
    $objControl->Render();
}
?>
<p><?php $_CONTROL->btnDale->Render(); ?></p>
<?php $_CONTROL->lblInfo->Render(); ?>