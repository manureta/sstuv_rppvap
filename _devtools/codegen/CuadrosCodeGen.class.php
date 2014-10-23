<?php
/**
 * Description of CuadrosCodeGenclass
 *
 * @author www-data
 */
set_time_limit(0);
require_once 'QCodeGen.class.php';
class CuadrosCodeGen extends QCodegen {

    public static $TemplatesPath = "/codegen/cuadros/";
    public static $ApacheTemplate = "../apache/map/";
    public static $AutoloadTemplate = "../autoload/autoload_tpl/";
    public static $CuadrosTemplate = "/general/";
    public static $ConsistenciasTemplate = "/consistencias/";
    public static $MigracionesTemplate = "/migraciones/";
    public static $CuadroMapTemplate = "../cuadros/map/";

    public static $objCuadrosArray = array();

    public static $PaginasArray = array();

    public static $objDefinicionConsistenciaArray = array();

    public static $objDefinicionMigracionArray = array();

    protected $intDatabaseIndex = 1;

   

    public function __construct() {
    //TODO:cargar el array de Cuadros como se necesita.
    //la primera que aparece hoy en la Tabla con la plantilla 1

	CuadrosCodegen::$objCuadrosArray = DefinicionCuadro::LoadAll(QQ::OrderBy(QQN::DefinicionCuadro()->Orden, QQN::DefinicionCuadro()->IdDefinicionCuadro));
/*        $arrIds = array();
        foreach(CuadrosCodegen::$objCuadrosArray as $objCuadro) {
//            if (isset($objCuadro->DefcuadroDefconsistenciaAsIdArray))
            foreach ($objCuadro->DefcuadroDefconsistenciaAsIdArray as $objDefCuadroDefConsistencia) {
                if (!in_array($objDefCuadroDefConsistencia->IdDefinicionConsistencia, $arrIds)) {
                    array_push(CuadrosCodegen::$objDefinicionConsistenciaArray, $objDefCuadroDefConsistencia->IdDefinicionConsistenciaObject);
                    array_push($arrIds, $objDefCuadroDefConsistencia->IdDefinicionConsistencia);
                }
            }
        }*/
	CuadrosCodegen::$PaginasArray = DefinicionPagina::LoadAll(QQ::OrderBy(QQN::DefinicionPagina()->IdDefinicionCapitulo, QQN::DefinicionPagina()->Numero));
        CuadrosCodegen::$objDefinicionConsistenciaArray = DefinicionConsistencia::LoadAll(QQ::OrderBy(QQN::DefinicionConsistencia()->IdDefinicionConsistencia));
        CuadrosCodegen::$objDefinicionMigracionArray = DefinicionMigracion::LoadAll(QQ::OrderBy(QQN::DefinicionMigracion()->IdDefinicionMigracion));

	$this->intDatabaseIndex = 1;
    }


    protected function EvaluateSubTemplate($strSubTemplateFilename, $strModuleName, $mixArgumentArray) {
			if (QCodeGen::DebugMode) _p("Evaluating $strSubTemplateFilename<br/>", false);

			// Try the Custom SubTemplate Path
			$strFilename = sprintf('%s%s%s/%s', __QCODO__, QCodeGen::TemplatesPathCustom, $strModuleName, $strSubTemplateFilename);
			if (file_exists($strFilename))
				return $this->EvaluateTemplate(file_get_contents($strFilename), $strModuleName, $mixArgumentArray);

			// Try the Standard SubTemplate Path
			$strFilename = sprintf('%s%s%s/%s', __QCODO_CORE__, QCodeGen::TemplatesPath, $strModuleName, $strSubTemplateFilename);
			if (file_exists($strFilename))
				return $this->EvaluateTemplate(file_get_contents($strFilename), $strModuleName, $mixArgumentArray);

                         // TODO Mover esto a algun otro lado, o de otro modo, esta hardcodeado aca para poder generar cuadros
			// Try the Project devtools SubTemplate Path
			$strFilename = sprintf('%s%s%s/%s', __PROJECT_DIR__."/_devtools", CuadrosCodeGen::$TemplatesPath, $strModuleName, $strSubTemplateFilename);
			if (file_exists($strFilename))
				return $this->EvaluateTemplate(file_get_contents($strFilename), $strModuleName, $mixArgumentArray);

                        //Si no esta en el subtemplate buscar en el general
			$strFilename = sprintf('%s%s%s/%s', __PROJECT_DIR__."/_devtools", CuadrosCodeGen::$TemplatesPath, '/general/', $strSubTemplateFilename);
			if (file_exists($strFilename))
				return $this->EvaluateTemplate(file_get_contents($strFilename), $strModuleName, $mixArgumentArray);


			// SubTemplate Does Not Exist
			throw new QCallerException('CodeGen SubTemplate Does Not Exist within the "' . $strModuleName . '" module: ' . $strSubTemplateFilename);
		}

    public static function Run($strSettingsXmlFilePath) {
	self::$CodeGenArray = array();
	self::$SettingsFilePath = $strSettingsXmlFilePath;
	if (!file_exists($strSettingsXmlFilePath)) {
	    self::$RootErrors = 'FATAL ERROR: CodeGen Settings XML File (' . $strSettingsXmlFilePath . ') was not found.';
	    return;
	}

	if (!is_file($strSettingsXmlFilePath)) {
	    self::$RootErrors = 'FATAL ERROR: CodeGen Settings XML File (' . $strSettingsXmlFilePath . ') was not found.';
	    return;
	}

	// Try Parsing the Xml Settings File
	try {
	    QApplication::SetErrorHandler('QcodoHandleCodeGenParseError', E_ALL);
	    self::$SettingsXml = new SimpleXMLElement(file_get_contents($strSettingsXmlFilePath));
	    QApplication::RestoreErrorHandler();
	} catch (Exception $objExc) {
	    self::$RootErrors .= 'FATAL ERROR: Unable to parse CodeGenSettings XML File: ' . $strSettingsXmlFilePath;
	    self::$RootErrors .= "\r\n";
	    self::$RootErrors .= $objExc->getMessage();
	    return;
	}

	// Set the Template Escaping
	self::$TemplateEscapeBegin = self::LookupSetting(self::$SettingsXml, 'templateEscape', 'begin');
	self::$TemplateEscapeEnd = self::LookupSetting(self::$SettingsXml, 'templateEscape', 'end');
	self::$TemplateEscapeBeginLength = strlen(self::$TemplateEscapeBegin);
	self::$TemplateEscapeEndLength = strlen(self::$TemplateEscapeEnd);

	if ((!self::$TemplateEscapeBeginLength) || (!self::$TemplateEscapeEndLength)) {
	    self::$RootErrors .= "CodeGen Settings XML Fatal Error: templateEscape begin and/or end was not defined\r\n";
	    return;
	}

	// Application Name
	self::$ApplicationName = self::LookupSetting(self::$SettingsXml, 'name', 'application');

	self::$CodeGenArray = array(new CuadrosCodeGen());
    }


    public function GenerateById($intIdDefinicionCuadro, $blnOutputText = true){
        $objDefinicionCuadro = DefinicionCuadro::Load($intIdDefinicionCuadro);
        $strToReturn = "";
        
        $this->GenerateCuadro($objDefinicionCuadro);
        if ($blnOutputText)
            _p('Cuadro'.$objDefinicionCuadro->IdDefinicionCuadro.' generado<br />', false);
        else
            $strToReturn = 'Cuadro'.$objDefinicionCuadro->IdDefinicionCuadro.' generado<br />';
        

	$this->GenerateAutoload(CuadrosCodeGen::$objCuadrosArray);
	$this->GeneratePaginaMap(CuadrosCodeGen::$PaginasArray);
	$this->GenerateCuadroMap(CuadrosCodeGen::$objCuadrosArray);
        return $strToReturn;
    }


    public function GenerateAll() {
        
        //TODO: generar los include recorro los cuadros
	foreach(self::$objCuadrosArray as $objDefinicionCuadro) {
		$this->GenerateCuadro($objDefinicionCuadro);
		_p('Cuadro'.$objDefinicionCuadro->IdDefinicionCuadro.' generado<br />', false);
	}
	foreach(self::$objDefinicionConsistenciaArray as $objDefinicionConsistencia) {
		$this->GenerateConsistencia($objDefinicionConsistencia);
		_p('Consistencia '.$objDefinicionConsistencia->IdDefinicionConsistencia.' generada<br />', false);
	}
	foreach(self::$objDefinicionMigracionArray as $objDefinicionMigracion) {
		$this->GenerateMigracion($objDefinicionMigracion);
		_p('Migracion '.QConvertNotation::CamelCaseFromUnderscore($objDefinicionMigracion->NombreCorto).' generada<br />', false);
	}
	$this->GenerateAutoload(CuadrosCodeGen::$objCuadrosArray);
	$this->GeneratePaginaMap(CuadrosCodeGen::$PaginasArray);
	$this->GenerateCuadroMap(CuadrosCodeGen::$objCuadrosArray);
    }

    public function GenerateConsistencias(){
        foreach(CuadrosCodegen::$objDefinicionConsistenciaArray as $objDefinicionConsistencia){
            $this->GenerateConsistencia($objDefinicionConsistencia);
        }
        $this->GenerateAutoload(CuadrosCodegen::$objCuadrosArray);
    }

    public function GenerateConsistenciaById($intIdDefinicionConsistencia){
        $objDefinicionConsistencia = DefinicionConsistencia::Load($intIdDefinicionConsistencia);
        if($objDefinicionConsistencia)
            $this->GenerateConsistencia($objDefinicionConsistencia);
    }

    public function GenerateConsistencia(DefinicionConsistencia $objDefinicionConsistencia){
        $mixArgumentArray = array('objDefinicionConsistencia' => $objDefinicionConsistencia);
        return $this->GenerateFiles(self::$ConsistenciasTemplate, $mixArgumentArray);
    }

    public function GenerateMigracion(DefinicionMigracion $objDefinicionMigracion){
        $mixArgumentArray = array('objDefinicionMigracion' => $objDefinicionMigracion);
        return $this->GenerateFiles(self::$MigracionesTemplate, $mixArgumentArray);
    }

    public function GenerateAutoload($objDefinicionCuadroArray){
        $mixArgumentArray = array('objDefinicionCuadroArray' => $objDefinicionCuadroArray,
                                  'objDefinicionConsistenciaArray' => self::$objDefinicionConsistenciaArray,
                                  'objDefinicionMigracionArray' => self::$objDefinicionMigracionArray);
        return $this->GenerateFiles(self::$AutoloadTemplate, $mixArgumentArray);
    }


    public function GenerateCuadro(DefinicionCuadro $objDefinicionCuadro) {
        $mixArgumentArray = array('objDefinicionCuadro' => $objDefinicionCuadro);
	//return $this->GenerateFiles(CuadrosCodeGen::$CuadrosTemplate, $mixArgumentArray);
        return $this->GenerateFiles('general', $mixArgumentArray);
    }

    public function GeneratePaginaMap($objPaginaArray) {
        $mixArgumentArray = array('objPaginaArray' => $objPaginaArray);
	return $this->GenerateFiles(CuadrosCodeGen::$ApacheTemplate, $mixArgumentArray);
    }

    public function GenerateCuadroMap($objCuadroArray) {
        $mixArgumentArray = array('objCuadroArray' => $objCuadroArray);
	return $this->GenerateFiles(CuadrosCodeGen::$CuadroMapTemplate, $mixArgumentArray);
    }

    /**
     * Given a template prefix (e.g. db_orm_, db_type_, rest_, soap_, etc.), pull
     * all the _*.tpl templates from any subfolders of the template prefix in self::TemplatesPath and self::TemplatesPathCustom,
     * and call GenerateFile() on each one.  If there are any template files that reside
     * in BOTH TemplatesPath AND TemplatesPathCustom, then only use the TemplatesPathCustom one (which
     * in essence overrides the one in TemplatesPath).
     *
     * @param string $strTemplatePrefix the prefix of the templates you want to generate against
     * @param mixed[] $mixArgumentArray array of arguments to send to EvaluateTemplate
     * @return boolean success/failure on whether or not all the files generated successfully
     */
    public function GenerateFiles($strTemplatePrefix, $mixArgumentArray) {
    // Make sure both our Template and TemplateCustom paths are valid
	$strTemplatePath = sprintf('%s%s%s%s', __PROJECT_DIR__, "/_devtools",self::$TemplatesPath, $strTemplatePrefix);
	if (!is_dir($strTemplatePath))
	    throw new Exception(sprintf("self::TemplatesPath does not appear to be a valid directory:\r\n%s", $strTemplatePath));


	// Create an array of arrays of standard templates and custom (override) templates to process
	// Index by [module_name][filename] => true/false where
	// module name (e.g. "class_gen", "form_delegates) is name of folder within the prefix (e.g. "db_orm")
	// filename is the template filename itself (in a _*.tpl format)
	// true = override (use custom) and false = do not override (use standard)
	$strTemplateArray = array();

	// Go through standard templates first
	$objDirectory = opendir($strTemplatePath);
	while ($strModuleName = readdir($objDirectory))
	    if ((!in_array($strModuleName,self::$strDirectoriesToExcludeArray)) &&
		!is_dir($strTemplatePath . '/' . $strModuleName)) {

	    // We're in a valid Module -- look for any _*.tpl template files		
		    if ((QString::FirstCharacter($strModuleName) == '_') &&
			(substr($strModuleName, strlen($strModuleName) - 4) == '.tpl'))
                                            $strTemplateArray[$strTemplatePrefix][$strModuleName] = false;

	    }

	// Finally, iterate through all the TempalteFiles and call GenerateFile to Evaluate/Generate/Save them
	$blnSuccess = true;
	foreach ($strTemplateArray as $strModuleName => $strFileArray){
	    foreach ($strFileArray as $strFilename => $blnOverrideFlag){
		if (!$this->GenerateFile($strTemplatePrefix , $strFilename, $blnOverrideFlag, $mixArgumentArray))
		    $blnSuccess = false;
	    }
	}
	return $blnSuccess;
    }


    /**
     * Enter description here...
     *
     * @param string $strModuleName
     * @param string $strFilename
     * @param boolean $blnOverrideFlag whether we are using the _core template, or using a custom one
     * @param mixed[] $mixArgumentArray
     * @param boolean $blnSave wheather or not to actually perform the save
     * @return mixed returns the evaluated template or boolean save success.
     */
    public function GenerateFile($strModuleName, $strFilename, $blnOverrideFlag, $mixArgumentArray, $blnSave = true) {
    // Figure out the actual TemplateFilePath
	$strTemplateFilePath = __PROJECT_DIR__. "/_devtools". self::$TemplatesPath . $strModuleName . '/' . $strFilename;

	// Setup Debug/Exception Message
	if (self::DebugMode) _p("Evaluating $strTemplateFilePath<br/>", false);
	$strError = 'Template\'s first line must be <template OverwriteFlag="boolean" DocrootFlag="boolean" TargetDirectory="string" DirectorySuffix="string" TargetFileName="string"/>: ' . $strTemplateFilePath;

	// Check to see if the template file exists, and if it does, Load It
	if (!file_exists($strTemplateFilePath))
	    throw new QCallerException('Template File Not Found: ' . $strTemplateFilePath);
	$strTemplate = file_get_contents($strTemplateFilePath);

	// Evaluate the Template
	$strTemplate = $this->EvaluateTemplate($strTemplate, $strModuleName, $mixArgumentArray);

	// Parse out the first line (which contains path and overwriting information)
	$intPosition = strpos($strTemplate, "\n");
	if ($intPosition === false)
	    throw new Exception($strError);

	$strFirstLine = trim(substr($strTemplate, 0, $intPosition));
	$strTemplate = substr($strTemplate, $intPosition + 1);

	$objTemplateXml = null;
	// Attempt to Parse the First Line as XML
	try {
	    @$objTemplateXml = new SimpleXMLElement($strFirstLine);
	} catch (Exception $objExc) {}

	if (is_null($objTemplateXml) || (!($objTemplateXml instanceof SimpleXMLElement)))
	    throw new Exception($strError);

	$blnOverwriteFlag = QType::Cast($objTemplateXml['OverwriteFlag'], QType::Boolean);
	$blnDocrootFlag = QType::Cast($objTemplateXml['DocrootFlag'], QType::Boolean);
	$strTargetDirectory = QType::Cast($objTemplateXml['TargetDirectory'], QType::String);
	$strDirectorySuffix = QType::Cast($objTemplateXml['DirectorySuffix'], QType::String);
	$strTargetFileName = QType::Cast($objTemplateXml['TargetFileName'], QType::String);

	if (is_null($blnOverwriteFlag) || is_null($strTargetFileName) || is_null($strTargetDirectory) || is_null($strDirectorySuffix) || is_null($blnDocrootFlag))
	    throw new Exception($strError);

	if ($blnSave && $strTargetDirectory) {
	// Figure out the REAL target directory
	    if ($blnDocrootFlag)
		$strTargetDirectory = __DOCROOT__ . $strTargetDirectory . $strDirectorySuffix;
	    else
		$strTargetDirectory = $strTargetDirectory . $strDirectorySuffix;

	    // Create Directory (if needed)
	    if (!is_dir($strTargetDirectory))
		if (!QApplication::MakeDirectory($strTargetDirectory, 0777))
		    throw new Exception('Unable to mkdir ' . $strTargetDirectory);

	    // Save to Disk
	    $strFilePath = sprintf('%s/%s', $strTargetDirectory, $strTargetFileName);
	    if ($blnOverwriteFlag || (!file_exists($strFilePath))) {
		$intBytesSaved = file_put_contents($strFilePath, $strTemplate);

		// CHMOD to full read/write permissions (applicable only to nonwindows)
		// Need to ignore error handling for this call just in case
		QApplication::SetErrorHandler(null);
		chmod($strFilePath, 0666);
		QApplication::RestoreErrorHandler();

		return ($intBytesSaved == strlen($strTemplate));
	    } else
	    // Becuase we are not supposed to overwrite, we should return "true" by default
		return true;
	}

	// Why Did We Not Save?
	if ($blnSave)
	// We WANT to Save, but QCubed Configuration says that this functionality/feature should no longer be generated
	// By definition, we should return "true"
	    return true;
	else
	// Running GenerateFile() specifically asking it not to save -- so return the evaluated template instead
	    return $strTemplate;
    }


}
?>
