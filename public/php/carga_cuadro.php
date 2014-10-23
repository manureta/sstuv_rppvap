<?php
require('../../app/Bootstrap.php');
Bootstrap::Initialize();

Session::setLocalizacion(Localizacion::Load($_GET['idlocalizacion']));
$nro = $_GET['nrocuadro'];
$cuad = $_GET['cuader'];
QApplication::Redirect(sprintf('%s/%s/cuadro/%s', __VIRTUAL_DIRECTORY__, $cuad, $nro));
?>
