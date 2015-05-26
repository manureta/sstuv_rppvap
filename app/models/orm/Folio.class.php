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
	
	public function calcular_nomenclaturas(){
        Permission::Log("Calculando nomenclaturas de FOLIO ".$this->intId);
        try {
            $cod=intval($this->IdPartidoObject->CodPartido);
            $gid=$this->intId;
            $strQuery = "select gid,nomencla,partida,titular_dominio from parcelas where partido=$cod AND nomencla not in(SELECT  (((((lpad(n.partido::text, 3, '0'::text) || lpad(n.circ::text, 2, '0'::text)) || lpad(n.secc::text, 2, '0'::text)) || lpad(n.chac_quinta::text, 14, '0'::text)) || lpad(n.frac::text, 7, '0'::text)) || lpad(n.mza::text, 7, '0'::text)) || lpad(n.parc::text, 7, '0'::text) AS nomencla FROM nomenclatura n where id_folio=$gid ) AND st_intersects(geom,(select the_geom from v_folios where gid=$gid))";
            
            $objDatabase = QApplication::$Database[1];

            // Perform the Query
            $objDbResult = $objDatabase->Query($strQuery);
            
            while ($row = $objDbResult->FetchArray()) {
               
                $nomencla=$row['nomencla'];
                $partida=$row['partida'];
				$titular=$row['titular_dominio'];
                $nom = new Nomenclatura();
                $nom->IdFolio = $this->intId;
                $nom->PartidaInmobiliaria = $partida;
                $nom->TitularDominio = $titular;
                $nom->Partido = substr($nomencla,0,3);
                $nom->Circ = substr($nomencla,3,2);//2
                $nom->Secc = substr($nomencla,5,2);//2
                $nom->ChacQuinta = substr($nomencla,7,14);//14
                $nom->Frac = substr($nomencla,21,7);//7
                $nom->Mza = substr($nomencla,28,7);//7;
                $nom->Parc = substr($nomencla,35,7);//7;
                $nom->InscripcionDominio = '';
                $nom->EstadoGeografico='';
                $nom->DatoVerificadoRegPropiedad = false;
                $nom->Save();
                
            }                     
        } catch (Exception $e) {
            QApplication::DisplayAlert("<p>Error al calcular las nomenclaturas del barrio</p>");
            // mandar mail
            Permission::Log($e->getMessage());
        }
        $this->actualizarEstadoNomenclaturas();
    	    	               
	    
	 }
	 
	public function actualizarEstadoNomenclaturas(){
        try{
         Permission::Log("actualizando estado geografico de nomenc del FOLIO ".$this->intId);
         $objDatabase = QApplication::$Database[1];
         $id_folio=$this->intId;
         $strQuery="select actualizar_estado_nomenclaturas($id_folio)";
         $objDatabase->NonQuery($strQuery);   
        }catch(Exception $e){
          QApplication::DisplayAlert("<p>Hubo un error al actualizar la geometria de las nomenclaturas:</p>".$e->getMessage());  
        }
         
    }

}
?>
