<?php
require('../../app/Bootstrap.php');
Bootstrap::Initialize();
$objDbOltp = QApplication::$Database[2];
$objDbCarga = QApplication::$Database[1];

$arrCodigos = array(
	TipoDatoType::DENOMINACION_TALLER_ESPECIAL => 4,
	TipoDatoType::NOMBRE_CARRERA_SUPERIOR => 2,
	TipoDatoType::ACTIVIDAD_ESPECIALIDAD => 9,
	TipoDatoType::TITULO_ARTISTICA => 8,
	TipoDatoType::ESPECIALIDAD_ARTISTICA => 81,
	TipoDatoType::ESPECIALIDAD_FP => 71,
	TipoDatoType::TITULO_SECUNDARIA =>1
);


foreach ($_GET as $k => $v) {
    $_GET[$k] = preg_replace('/^([^\w\s.\-]+)*$/', '', $v);
}
foreach ($_POST as $k => $v) {
    $_POST[$k] = preg_replace('/^([^\w\s.\-]+)*$/', '', $v);
}

if (isset($_POST['q']))
    $strText = $_POST['q'];

if (!isset($strText)) {
    #echo 'Undefined POST q';
    error_log('1 por entrar en strText '.$strText);
    die;
}
if (!$intCTipoDatoType = QApplication::QueryString('tipo_dato_type')) {
    #echo 'Undefined GET tipo_dato_type';
    die;
}
$intIdDefinicionCuadro = QApplication::QueryString('id_definicion_cuadro');

switch ($intIdDefinicionCuadro) {
    case 612:
    case 449:
    case 432:
    case 458:
    case 617:
    case 525:
        // cuadernillo violeta
        $intIdDefinicionCuadroAnt = 430;
    break;
    case 611:
    default:
        // cuadernillo celeste
        $intIdDefinicionCuadroAnt = 157;
    break;
}


try {
	if($intCTipoDatoType == TipoDatoType::TITULO_TTP_IF_TAP_OT){

/*
HAY QUE TOMAR EL VALOR DE LA COLUMNA NÚMERO 550 (ttp, if, tap, ot)
*/



		// @TODO tap y ot
		$strQuery = "SELECT c_titulo, cod_rama, cod_disciplina, cod_carrera, cod_titulo, descripcion, c_nivel_titulo ".
					"FROM codigos.titulo_tipo ".
					#"JOIN codigos.nivel_titulo_tipo using (c_nivel_titulo) ".
					"WHERE c_nivel_titulo in (".implode(',', $arrIn).') '.
					($strText?" AND descripcion ILIKE '%$strText%'":'').
					' LIMIT 60';
		$objResult = $objDbOltp->Query($strQuery);
		$arrReturn = array();
		while ($arrRow = $objResult->FetchRow()) {
			$strDescripcion = $arrRow[5];
			$intCTitulo = $arrRow[0];
			switch ($arrRow[6]) {
				case 5:
					$strTipoTitulo = 'TTP';
				break;
				case 6:
					$strTipoTitulo = 'IF';
				break;
				// @TODO todas las demas opciones!!!
				default:
					$strTipoTitulo = '';
				break;
			}
			array_push($arrReturn, array($strTipoTitulo. ' - '. $strDescripcion, $intCTitulo));
		}
	}
	else{
		$objTituloArray = OLTPTituloTipo::QueryArray(
			QQ::AndCondition(
				QQ::Equal(QQN::OLTPTituloTipo()->CNivelTitulo, $arrCodigos[$intCTipoDatoType]),
				QQ::Like(QQN::OLTPTituloTipo()->Descripcion, '%'.$strText.'%')
			),
			QQ::LimitInfo(60)
		);
		$arrReturn = array();
		foreach($objTituloArray as $objTitulo){
			$arrReturn[] = array($objTitulo->Descripcion,$objTitulo->CTitulo);
		}
    }
    if (count($arrReturn))
		foreach ($arrReturn as $arrItem) {
			foreach ($arrItem as $item)
				echo $item . "|";
			echo "\n";
		}
    die;
} catch (Exception $e) {
    #echo $e->getMessage();
}
?>
