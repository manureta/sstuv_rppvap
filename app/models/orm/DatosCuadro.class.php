<?php
	require(__DATAGEN_CLASSES__ . '/DatosCuadroGen.class.php');

/**
 * The DatosCuadro class defined here contains any
 * customized code for the DatosCuadro class in the
 * Object Relational Model.  It represents the "datos_cuadro" table
 * in the database, and extends from the code generated abstract DatosCuadroGen
 * class, which contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * @package Relevamiento Anual
 * @subpackage DataObjects
 *
 */
class DatosCuadro extends DatosCuadroGen {
    public static $_objDatosCuadroCachedByIdDefinicionCuadroAndIdLocalizacionArray = array();
    
    public $blnModified = false;
    /**
     * Default "to string" handler
     * Allows pages to _p()/echo()/print() this object, and to define the default
     * way this object would be outputted.
     *
     * Can also be called directly via $objDatosCuadro->__toString().
     *
     * @return string a nicely formatted string representation of this object
     */
    public function __toString() {
        return sprintf('DatosCuadro Object %s',  $this->intIdDatosCuadro);
    }

    public static function CountByDatosCuadernilloRecibido() {
        try {
            return DatosCuadro::QueryCount(
                    QQ::NotEqual(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->CEstado, EstadoType::Faltante),
                    QQ::Clause(
                        QQ::Expand(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernillo)
                    )
            );
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    public static function LoadArrayByIdLocalizacionIdCuadernillo($intIdLocalizacion, $intIdDefinicionCuadernillo) {
        try {
            return DatosCuadro::QueryArray(
                    QQ::AndCondition(
                        QQ::Equal(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernillo, $intIdDefinicionCuadernillo),
                        QQ::Equal(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdLocalizacion, $intIdLocalizacion)),
                    QQ::Clause(
                    QQ::Expand(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdDefinicionCuadernillo)
                    )
            );
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }
    
    public function Save($blnForceInsert = false, $blnForceUpdate = false) {
        if($this->blnModified){
            $objUsuario = Session::GetObjUsuario();
            if($objUsuario)
                $this->IdUsuario = $objUsuario->IdUsuario;
            $this->FechaModificacion = QDateTime::Now();
            if (defined('__AUDITORIA_CUADROS__') && __AUDITORIA_CUADROS__) {
                $str = sprintf("(%s) %s %s", EstadoType::ToString($this->CEstado), $objUsuario, serialize($this));
                LogHelper::Log($str, "cuadros_modificaciones.log");
            }
        }
        return parent::Save($blnForceInsert, $blnForceUpdate);
    }
    
    private function Encrypt(){
        $objMCrypt = new QCryptography();
        return $objMCrypt->Encrypt(serialize($this));
    }

    /**
     * Load an array of DatosCuadro objects,
     * by IdDefinicionCuadro Index(es)
     * @param integer $intIdDefinicionCuadro
     * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
     * @return DatosCuadro[]
     */
    public static function LoadSingleByIdDefinicionCuadroIdLocalizacion($intIdDefinicionCuadro, $intIdLocalizacion) {
        // Call DatosCuadro::QueryArray to perform the LoadArrayByIdDefinicionCuadro query
        //return QQN::DatosCuadro();
        try {
            return DatosCuadro::QuerySingle(
                    QQ::AndCondition(QQ::Equal(QQN::DatosCuadro()->IdDefinicionCuadro, $intIdDefinicionCuadro ),
                    QQ::Equal(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdLocalizacion, $intIdLocalizacion )),
                    // Let's expand on the Project, itself
                    QQ::Clause(
                    QQ::Expand(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject)
                    )
            );
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    protected static $_InsertPrepared;
    public function InsertPrepared(){
        $objDatabase = self::GetDatabase();
        $strQuery = 'INSERT INTO "datos_cuadro" (
                "id_datos_capitulo",
                "id_definicion_cuadro",
                "c_estado"
            ) VALUES (?,?,?)';
        if(!self::$_InsertPrepared){
            self::$_InsertPrepared = $objDatabase->PrepareStatement ($strQuery);
        }
        $mixParameterArray = array($this->intIdDatosCapitulo,
                                   $objDatabase->SqlVariable($this->intIdDefinicionCuadro),
                                   (!is_null($this->intCEstado)?$objDatabase->SqlVariable($this->intCEstado):self::CEstadoDefault));
        
        $objDatabase->NonQuery($strQuery, self::$_InsertPrepared, $mixParameterArray);
        
    }

    public static function CrearDatosCuadro($intIdDefinicionCuadro, $strNombreCortoCuadernillo,$objLocalizacion = null) {
        $objDefinicionCuadro = DefinicionCuadro::Load($intIdDefinicionCuadro);
        $objDatosCuadro = null;

        if(!$objLocalizacion) {
            if (!defined('__GENERAR_DATOS_CUADRO__')) {
                throw new QCallerException("CrearDatosCuadro llamado sin localización");
            }
            $objLocalizacion = Session::getLocalizacion();
        }

        $objLocalizacionNoOLTP = Localizacion::Load((integer)$objLocalizacion->IdLocalizacion);
        if(!$objLocalizacionNoOLTP) {
            $objLocalizacionNoOLTP = new Localizacion();
            $objLocalizacionNoOLTP->IdLocalizacion = $objLocalizacion->IdLocalizacion;
            $objLocalizacionNoOLTP->Nombre = $objLocalizacion->Nombre;
            $objLocalizacionNoOLTP->Cueanexo = $objLocalizacion->Cueanexo;
            $objLocalizacionNoOLTP->CEstado = EstadoType::Faltante;
            $objLocalizacionNoOLTP->Save();
        }
        if (!$objDefinicionCuadro->DefcuadroDefpaginaAsIdArray)            throw new Exception('no existe cuadro '.$intIdDefinicionCuadro);
        foreach ($objDefinicionCuadro->DefcuadroDefpaginaAsIdArray as $objDefcuadroDefpagina) {

                $objDefinicionCuadernillo = $objDefcuadroDefpagina->IdDefinicionPaginaObject->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject;

                if($objDefinicionCuadernillo->NombreCorto != $strNombreCortoCuadernillo) continue;
                
                //Traer el DatosCuadernillo que corresponde
                $objDatosCuadernillo = DatosCuadernillo::LoadByIdLocalizacionAndIdDefinicionCuadernilloCached((integer)$objLocalizacion->IdLocalizacion, (integer)$objDefinicionCuadernillo->IdDefinicionCuadernillo);
                if(!$objDatosCuadernillo){
                    $objDatosCuadernillo = new DatosCuadernillo();
                    $objDatosCuadernillo->IdDefinicionCuadernilloObject = $objDefinicionCuadernillo;
                    $objDatosCuadernillo->CEstado = EstadoType::Faltante;
                    $objDatosCuadernillo->IdLocalizacionObject = $objLocalizacion;
                    $intIdDatosCuadernillo = $objDatosCuadernillo->Save();
                    DatosCuadernillo::$_DatosCuadernilloArray[sprintf("%s_%s",$objLocalizacion->IdLocalizacion, $objDefinicionCuadernillo->IdDefinicionCuadernillo)] = $objDatosCuadernillo;
                } else $intIdDatosCuadernillo = $objDatosCuadernillo->IdDatosCuadernillo;
                $objDatosCapitulo = DatosCapitulo::LoadByIdDefinicionCapituloAndIdDatosCuadernillo((integer)$objDefcuadroDefpagina->IdDefinicionPaginaObject->IdDefinicionCapitulo, (integer)$objDatosCuadernillo->IdDatosCuadernillo);

//                if(!$objDatosCuadernillo ||!$objDatosCapitulo ){
//                    throw new Exception("No Puede cargar el Cuadro {$objDefinicionCuadro->IdDefinicionCuadro} porque esta localizacion no lo tiene asignado.");
//                }


                if(!$objDatosCapitulo ){
                    $objDefinicionCapitulo = $objDefcuadroDefpagina->IdDefinicionPaginaObject->IdDefinicionCapituloObject;
                    $objDatosCapitulo = new DatosCapitulo();
                    $objDatosCapitulo->IdDefinicionCapituloObject = $objDefinicionCapitulo;
                    $objDatosCapitulo->IdDatosCuadernilloObject = $objDatosCuadernillo;
                    $objDatosCapitulo->CEstado = EstadoType::Vacio;
                    $intIdDatosCapitulo = $objDatosCapitulo->Save();
                    DatosCapitulo::$_DatosCapituloArray[sprintf("%s_%s",$objDefinicionCapitulo->IdDefinicionCapitulo, $objDatosCuadernillo->IdDatosCuadernillo)] = $objDatosCapitulo;
                }
                
                $objDatosCuadro = (isset(self::$_objDatosCuadroCachedByIdDefinicionCuadroAndIdLocalizacionArray["{$objDefinicionCuadro->IdDefinicionCuadro}-{$objDatosCapitulo->IdDatosCapitulo}-{$objLocalizacion->IdLocalizacion}"]))?self::$_objDatosCuadroCachedByIdDefinicionCuadroAndIdLocalizacionArray["{$objDefinicionCuadro->IdDefinicionCuadro}-{$objDatosCapitulo->IdDatosCapitulo}-{$objLocalizacion->IdLocalizacion}"]:null;

                if(!$objDatosCuadro){
                    $objDatosCuadro = new DatosCuadro();
                    $objDatosCuadro->IdDatosCapituloObject = $objDatosCapitulo;
                    $objDatosCuadro->IdDefinicionCuadroObject = $objDefinicionCuadro;
                    $objDatosCuadro->CEstado = EstadoType::Vacio;
                    $objDatosCuadro->InsertPrepared();
                    self::$_objDatosCuadroCachedByIdDefinicionCuadroAndIdLocalizacionArray["{$objDatosCuadro->IdDefinicionCuadro}-{$objDatosCapitulo->IdDatosCapitulo}-{$objLocalizacion->IdLocalizacion}"] = true;
                }

            //$this->objDatosCuadro = $objDatosCuadro;
        }
        return $objDatosCuadro;
    }

    public static function CrearDatosCuadroWithCueanexoCuadernillo($strCueanexo,$strCuadernillo, $strNumeroCuadro){

        $objLocalizacion = Localizacion::LoadByCueanexo($strCueanexo);
        $objDefinicionCuadro = DefinicionCuadro::LoadByNombreCortoCuadernilloNumeroCuadro($strCuadernillo, $strNumeroCuadro);

        //Resuelve lo de los cuadros que no corresponden a buenos aires o viceversa.
        if($objDefinicionCuadro)
            self::CrearDatosCuadro($objDefinicionCuadro->IdDefinicionCuadro, $strCuadernillo, $objLocalizacion);
    }

    /**
     * se fija si Existe el Datos Cuadro en la Base de Datos.
     * Notar que Tiene un parametro $blnUseOnlyCached que evita hacer la consulta en la base de datos
     * Se usa para Cuando se genera todo el modelo de los cuadros que hay que crear
     * y todos los DatosCuadro estan cacheados a medida que un mismo script los va creando
     * @param integer $intIdDefinicionCuadro
     * @param Localizacion $objLocalizacion
     * @param boolean $blnUseOnlyCached
     * @return DatosCuadro
     */
    public static function ExistsDatosCuadro($intIdDefinicionCuadro, $objLocalizacion, $blnUseOnlyCached = false){
        if(array_key_exists("$intIdDefinicionCuadro-{$objLocalizacion->IdLocalizacion}",self::$_objDatosCuadroCachedByIdDefinicionCuadroAndIdLocalizacionArray))
                return self::$_objDatosCuadroCachedByIdDefinicionCuadroAndIdLocalizacionArray["$intIdDefinicionCuadro-{$objLocalizacion->IdLocalizacion}"];
        if($blnUseOnlyCached)
                return null;

        return (DatosCuadro::LoadSingleByIdDefinicionCuadroIdLocalizacion($intIdDefinicionCuadro, $objLocalizacion->IdLocalizacion) != null);
    }
}
?>
