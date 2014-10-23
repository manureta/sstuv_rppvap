<?php

require('../../app/Bootstrap.php');
Bootstrap::Initialize();
$objDbOltp = QApplication::$Database[2];

$strTerm = QApplication::QueryString("term");
$strprovincia = QApplication::QueryString("provincia");

$objLocalidadTipoArray = LocalidadTipo::QueryArray(
    QQ::AndCondition(
        QQ::OrCondition(
                    QQ::Like(QQN::LocalidadTipo()->NombreLocalidad, "%$strTerm%"),
                    QQ::Like(QQN::LocalidadTipo()->NombreDepartamento, "%$strTerm%")
      ),QQ::Equal(QQN::LocalidadTipo()->CProvincia,$strprovincia)
    )
);

$arrLocalidadTipoArray = array();
foreach($objLocalidadTipoArray as $objLocalidadTipo){
    $jsObject = new stdClass();
    $jsObject->label = sprintf("%s, %s", $objLocalidadTipo->NombreLocalidad, $objLocalidadTipo->NombreDepartamento);
    $jsObject->value = sprintf("%s, %s", $objLocalidadTipo->NombreLocalidad, $objLocalidadTipo->NombreDepartamento);
    $jsObject->id = $objLocalidadTipo->CLocalidad;
    $arrLocalidadTipoArray[$objLocalidadTipo->CLocalidad] = $jsObject;
}
echo json_encode($arrLocalidadTipoArray);
?>
