<?php
require(__DATAGEN_CLASSES__ . '/FolioGen.class.php');

class Folio extends FolioGen {
    protected $strNoun = 'Folio';
    protected $strNounPlural = 'Folios';
    protected $blnGenderMale = true;

    public function __toString() {
        return sprintf('%s',  $this->strCodFolio);
    }

    public function Save($blnForceInsert = false, $blnForceUpdate = false){
    	$this->strCodFolio = sprintf("%s%s",$this->IdPartidoObject->CodPartido , $this->strMatricula);
    	parent::Save($blnForceInsert, $blnForceUpdate);
    }
    /**
		 * Delete this Folio
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Folio with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Folio::GetDatabase();
			$objDatabase->NonQuery('DELETE FROM	"organismos_de_intervencion"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"antecedentes"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"equipamiento"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"nomenclatura"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"infraestructura"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"situacion_ambiental"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"transporte"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"condiciones_socio_urbanisticas"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"encuadre_legal"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"regularizacion"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM	"uso_interno"	WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
            parent::Delete();
		}

}
?>
