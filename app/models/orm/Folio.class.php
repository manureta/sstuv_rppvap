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
			$objDatabase->NonQuery('DELETE FROM "organismos_de_intervencion" WHERE "id_folio" = ' . $objDatabase->SqlVariable($this->intId) . '');
			$objDatabase->NonQuery('DELETE FROM     "evolucion_folio"       WHERE "id_folio" = '. $objDatabase->SqlVariable($this->intId) . '');
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

		public static function CambioEstadoFolio(Folio $objFolio){
	        $id=$objFolio->Id;
	        $strQuery = "select * from folio f 
	                    join condiciones_socio_urbanisticas c on f.id=c.id_folio
	                    join equipamiento e on f.id=e.id_folio
	                    join transporte t on f.id=t.id_folio
	                    join infraestructura i on f.id=i.id_folio
	                    join situacion_ambiental sa on f.id=sa.id_folio
	                    join regularizacion r on f.id=r.id_folio
	                    join encuadre_legal el on f.id=el.id_folio
	                    join antecedentes a on f.id=a.id_folio
	                    join organismos_de_intervencion oi on f.id=oi.id_folio
	                    join uso_interno ui on f.id=ui.id_folio where f.id=$id";
	        $objDatabase = QApplication::$Database[1];

	        // Perform the Query
	        $objDbResult = $objDatabase->Query($strQuery);
	        $row = $objDbResult->FetchArray();

		        if($row){
		        	foreach ($row as $key => $value) {
		            if (is_int($key)) {
		                unset($row[$key]);
		            }
		        }

		        $reg_evolucion= new EvolucionFolio();
		        $reg_evolucion->Fecha=QDateTime::Now();
		        $reg_evolucion->IdFolio=$objFolio->Id;
		        $reg_evolucion->Contenido=json_encode($row);
		        $reg_evolucion->Estado=$row['estado_folio'];
		        $reg_evolucion->save();	
	        }
	        
    }

}
?>
