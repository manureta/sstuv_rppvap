<?php
	require(__DATAGEN_CLASSES__ . '/DatosCuadernilloGen.class.php');

    /**
     * The DatosCuadernillo class defined here contains any
     * customized code for the DatosCuadernillo class in the
     * Object Relational Model.  It represents the "datos_cuadernillo" table 
     * in the database, and extends from the code generated abstract DatosCuadernilloGen
     * class, which contains all the basic CRUD-type functionality as well as
     * basic methods to handle relationships and index-based loading.
     * 
     * @package My Application
     * @subpackage DataObjects
     * 
     */
    class DatosCuadernillo extends DatosCuadernilloGen {
        /**
         * Default "to string" handler
         * Allows pages to _p()/echo()/print() this object, and to define the default
         * way this object would be outputted.
         *
         * Can also be called directly via $objDatosCuadernillo->__toString().
         *
         * @return string a nicely formatted string representation of this object
         */
        public function __toString() {
            return sprintf('DatosCuadernillo Object %s',  $this->intIdDatosCuadernillo);
        }

             
        public static $_DatosCuadernilloArray = array();
        /**
        * utiliza un array estatico para no levantar 2 veces el mismo objeto
        * y asi, además minimizar las consultas a la DB
        * @param integer $intIdLocalizacion
        * @param integer $intIdDefinicionCuadernillo
        */
        public static function LoadByIdLocalizacionAndIdDefinicionCuadernilloCached($intIdLocalizacion, $intIdDefinicionCuadernillo) {
                    
                    $objDatosCuadernillo = isset(self::$_DatosCuadernilloArray[sprintf("%s_%s",$intIdLocalizacion, $intIdDefinicionCuadernillo)])?self::$_DatosCuadernilloArray[sprintf("%s_%s",$intIdLocalizacion, $intIdDefinicionCuadernillo)]:null;
                    if(!$objDatosCuadernillo){
                        $objDatosCuadernillo = DatosCuadernillo::QuerySingle(QQ::AndCondition(
                            QQ::Equal(QQN::DatosCuadernillo()->IdLocalizacion, $intIdLocalizacion),
                            QQ::Equal(QQN::DatosCuadernillo()->IdDefinicionCuadernillo, $intIdDefinicionCuadernillo)
                        ));
                        if($objDatosCuadernillo)
                            self::$_DatosCuadernilloArray[sprintf("%s_%s",$intIdLocalizacion, $intIdDefinicionCuadernillo)] = $objDatosCuadernillo;
                    }
                    return $objDatosCuadernillo;
        }

     /**
      * Son dos conceptos distintos de recibir, aunque en definitiva se trataria de saber cuando llegó a la UE
      * solo debe guardar la fecha cuando esté en la UE, y dejarlo vacio cuando la escuela tiene que comenzar a cargar
      * @param boolean $blnRecibidoEnUE si lo recibió la UE o la escuela.
      * @return integer el id del registro del cuadernillo que se recibe.
      **/   
        public function RecibirCuadernillo($blnRecibidoEnUE = false){

            /*            R             RUE
             *  0   0 |  now            now
             *  0   1 |  now            now
             *  1   0 |  now            queda igual
             *  1   1 |  queda igual    now
             */
            if(!__CARGA_EN_ESCUELA__){
                $this->FechaRecepcionUe = QDateTime::Now();
                $this->FechaRecepcion = QDateTime::Now();
            }elseif(__CARGA_EN_ESCUELA__ && !$blnRecibidoEnUE){
                $this->FechaRecepcion = QDateTime::Now();
            }else{
                $this->FechaRecepcionUe = QDateTime::Now();
            }
            

             /*
             *  0   0   queda igual 
             *  0   1   queda igual 
             *  1   0   queda igual 
             *  1   1   cambia a VACIO
             */
            if(!__CARGA_EN_ESCUELA__ || !$blnRecibidoEnUE)
                $this->CEstado = EstadoType::Recibido;

            $this->Save();
        }

    // Calcula el estado del cuadernillo en funcion de los capitulos segun:
    //condición        Estado Final
    //todos 1              1
    //algún 2 y algún 7    6
    //algún 2 y algún 4    3
    //algún 6              6
    //algún 3              3
    //algún 2              2
    //todos 5              5
    //todos 10             10
    //algún 4 y resto 5    4
    //algún 7 y resto 5    7
    public function ActualizarEstado() {
        
        $oldCEstado = $this->CEstado;
        if($oldCEstado == EstadoType::Faltante) return;
        $arrEstados = EstadoType::$TokenArray;
        $intCapitulos = count($this->DatosCapituloAsIdArray);
        foreach($arrEstados as $CEstado => $token) $arrEstados[$CEstado] = 0; //inicio contadores
        foreach($this->DatosCapituloAsIdArray as $objDatosCapitulo) {
            if($objDatosCapitulo->CEstado == EstadoType::Modificado) $objDatosCapitulo->ActualizarEstado();
            $arrEstados[$objDatosCapitulo->CEstado]++;
        } 
        switch(true) {
            case $intCapitulos == $arrEstados[EstadoType::Vacio]:        $newCEstado = EstadoType::Recibido; break;
            case $intCapitulos == $arrEstados[EstadoType::Completo]:     $newCEstado = EstadoType::Completo; break;
            //case $intCapitulos == $arrEstados[EstadoType::Confirmado]:   $newCEstado = EstadoType::Confirmado; break;
            case $intCapitulos == ($arrEstados[EstadoType::Completo] + $arrEstados[EstadoType::Verificado]):     $newCEstado = EstadoType::Completo; break;
            case $arrEstados[EstadoType::Encargaconerrores]:   $newCEstado = EstadoType::Encargaconerrores; break;
            case $arrEstados[EstadoType::Encargaconinconsistencias]:   $newCEstado = EstadoType::Encargaconinconsistencias; break;
            case $arrEstados[EstadoType::Encarga] && $arrEstados[EstadoType::Completoconerrores]:   $newCEstado = EstadoType::Encargaconerrores; break;
            case $arrEstados[EstadoType::Encarga] && $arrEstados[EstadoType::Completoconinconsistencias]:   $newCEstado = EstadoType::Encargaconinconsistencias; break;
            case $arrEstados[EstadoType::Encarga]:   $newCEstado = EstadoType::Encarga; break;
            case $arrEstados[EstadoType::Completoconerrores] && ($intCapitulos - $arrEstados[EstadoType::Completoconerrores] - $arrEstados[EstadoType::Completoconinconsistencias]) == $arrEstados[EstadoType::Completo]:   $newCEstado = EstadoType::Completoconerrores; break;
            case $arrEstados[EstadoType::Completoconinconsistencias] && ($intCapitulos - $arrEstados[EstadoType::Completoconinconsistencias]) == $arrEstados[EstadoType::Completo]:   $newCEstado = EstadoType::Completoconinconsistencias; break;
            case $arrEstados[EstadoType::Completoconerrores]:   $newCEstado = EstadoType::Encargaconerrores; break;
            case $arrEstados[EstadoType::Completoconinconsistencias]:   $newCEstado = EstadoType::Encargaconinconsistencias; break;
            default:   $newCEstado = EstadoType::Encarga; break;
        }
        LogHelper::Debug("ActualizarEstado {$this->IdDatosCuadernillo} nuevo {$newCEstado} viejo {$oldCEstado}");
        // si el estado cambió, guardo
        if ($newCEstado != $oldCEstado) {
            // si el cuadernillo está confirmado, solo cambio el estado si el nuevo es con error
            if (!in_array($oldCEstado, array(EstadoType::Verificado,EstadoType::Confirmado)) || (in_array($newCEstado, array(EstadoType::Completoconerrores, EstadoType::Encargaconerrores)))) {
                $this->intCEstado = $newCEstado;
                $this->IdLocalizacionObject->CEstado = EstadoType::Modificado;
                $this->IdLocalizacionObject->Save();
                $this->Save();
            }
        }
        return $arrEstados;
    }

        public function Desconfirmar(){
            if($this->intCEstado == EstadoType::Confirmado){
                $this->intCEstado = EstadoType::Modificado;
                $this->IdLocalizacionObject->CEstado = EstadoType::Modificado;
                $this->IdLocalizacionObject->Save();
                //$this->ActualizarEstado();
                $this->Save();
                return true;
            }
            return false;
        }

        public static function LoadArrayByIdLocalizacion($intIdLocalizacion, $objOptionalClauses = null) {
            // Call DatosCuadernillo::QueryArray to perform the LoadArrayByIdLocalizacion query
            try {
                return DatosCuadernillo::QueryArray(
                    QQ::Equal(QQN::DatosCuadernillo()->IdLocalizacion, $intIdLocalizacion),
                    QQ::Clause(QQ::ExpandAsArray(QQN::DatosCuadernillo()->DatosCapituloAsId) ,$objOptionalClauses)
                    );
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
        }

    public function Limpiar() {
        if($this->intCEstado == EstadoType::Faltante) return;
        foreach($this->DatosCapituloAsIdArray as $objDatosCapitulo) {
            foreach($objDatosCapitulo->DatosCuadroAsIdArray as $objDatosCuadro) {
                foreach($objDatosCuadro->DatosCeldaAsIdArray as $objDatosCelda)
                    $objDatosCelda->Delete();
                $objDatosCuadro->CEstado = EstadoType::Vacio;
                $objDatosCuadro->Save();
            }
            $objDatosCapitulo->CEstado = EstadoType::Vacio;
            $objDatosCapitulo->Save();
        }
        $this->intCEstado = EstadoType::Vacio;
        $this->Save();
        $this->IdLocalizacionObject->CEstado = EstadoType::Modificado;
        $this->IdLocalizacionObject->Save();
    }

        public static function DeleteEmptys() {
            self::GetDatabase()->NonQuery('delete from datos_cuadernillo where id_datos_cuadernillo in (
    select distinct id_datos_cuadernillo from datos_cuadernillo 
    left join datos_capitulo using(id_datos_cuadernillo) 
    where id_datos_capitulo is null );');
        }

        public static function TurnColNameToFilterQQN($strColName) {
            switch ($strColName) {
                case 'CueAnexo':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Cueanexo;
                break;
                case 'IdDefinicionCuadernilloObject':
                        $objQQN = QQN::DatosCuadernillo()->IdDefinicionCuadernillo;
                break;
                case 'Localidad':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Localidad;
                break;
                case 'IdLocalizacionObject':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Nombre;
                break;
                case 'CArancelado':
                        $objQQN = QQN::DatosCuadernillo()->CArancelado;
                break;
                case 'CConfesional':
                        $objQQN = QQN::DatosCuadernillo()->CConfesional;
                break;
                case 'CCategoria':
                        $objQQN = QQN::DatosCuadernillo()->CCategoria;
                break;
                case 'IdResponsableObject':
                case 'Responsable':
                        $objQQN = QQN::DatosCuadernillo()->IdResponsableObject->Apellido;
                break;
                case 'OfertaTipo':
                        $objQQN = QQN::DatosCuadernillo()->LocalizacionAsId->OfertaLocalAsId->COferta;
                break;
                case 'Sector':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Sector;
                break;
                case 'Departamento':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Departamento;
                break;
                case 'CodigoJurisdiccional':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->CodigoJurisdiccional;
                break;
                default:
                    try {
                        $objQQN = QQN::DatosCuadernillo()->$strColName;
                    } catch (Exception $e) {
                        //throw new QCallerException("No esta definido el QQN para DatosCuadernillo()->$strColName");
                        return false;// TODO hacer algo aca
                    }
            }
            return $objQQN;
        }

        public static function TurnColNameToShowQQN($strColName) {
            switch ($strColName) {
                //case 'IdDefinicionCuadernilloObject':
                //        $objQQN = QQN::DatosCuadernillo()->IdDefinicionCuadernilloObject->Color;
                //break;
                case 'CueAnexo':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Cueanexo;
                break;
                case 'IdLocalizacionObject':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Nombre;
                break;
                case 'CodigoJurisdiccional':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->CodigoJurisdiccional;
                break;
                case 'Localidad':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Localidad;
                break;
                case 'CDependencia':
                        $objQQN = QQN::DatosCuadernillo()->CDependenciaObject->Descripcion;
                break;
                case 'CArancelado':
                        $objQQN = QQN::DatosCuadernillo()->CAranceladoObject->Descripcion;
                break;
                case 'CConfesional':
                        $objQQN = QQN::DatosCuadernillo()->CConfesionalObject->Descripcion;
                break;
                case 'CCategoria':
                        $objQQN = QQN::DatosCuadernillo()->CCategoriaObject->Descripcion;
                break;
                case 'Sector':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Sector;
                break;
                case 'Departamento':
                        $objQQN = QQN::DatosCuadernillo()->IdLocalizacionObject->Departamento;
                break;
                case 'IdResponsableObject':
                case 'Responsable':
                        $objQQN = QQN::DatosCuadernillo()->IdResponsableObject;
                break;
                /*case 'OfertaTipo':
                        $objQQN = QQN::DatosCuadernillo()->LocalizacionAsId->OfertaLocalAsId->COferta->Descripcion;
                break;*/
                default:
                    try {
                        $objQQN = QQN::DatosCuadernillo()->$strColName;
                    } catch (Exception $e) {
                        //throw new QCallerException("No esta definido el QQN para DatosCuadernillo()->$strColName");
                        return false;// TODO hacer algo aca
                    }
            }
            return $objQQN;
        }

        public static function RecalcularEstadoCuadernillos() {
            $objDatosCuadernilloArray = DatosCuadernillo::QueryArray(QQ::Equal(QQN::DatosCuadernillo()->CEstado, EstadoType::Modificado));
            foreach ($objDatosCuadernilloArray as $objDatosCuadernillo) {
                $objDatosCuadernillo->ActualizarEstado();
            }
        }

        public function Reload() {
            // Make sure we are actually Restored from the database
            if (!$this->__blnRestored)
                throw new QCallerException('Cannot call Reload() on a new, unsaved DatosCuadernillo object.');

            // Reload the Object
            $objReloaded = DatosCuadernillo::Load($this->intIdDatosCuadernillo, null, true);

            // Update $this's local variables to match
            $this->intIdDefinicionCuadernillo = $objReloaded->IdDefinicionCuadernillo;
            $this->intCEstado = $objReloaded->CEstado;
            $this->dttFechaRecepcion = $objReloaded->dttFechaRecepcion;
            $this->IdLocalizacion = $objReloaded->IdLocalizacion;
        }



        public function __set($strName, $mixValue){
            switch($strName){
                case 'CEstado':
                    if($this->intCEstado == EstadoType::Confirmado){
                        throw new ImposibleModificarCuadernilloConfirmadoException($this->IdDatosCuadernillo);
                    }else{
                        return parent::__set($strName, $mixValue);
                    }
                default:
                    return parent::__set($strName, $mixValue);
            }


        }
    }
?>
