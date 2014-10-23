<?php
require(__QCODO_CORE__ . '/codegen/QCodeGenBase.class.php');

// Feel free to override any core QCodeGenBase methods here
class QCodeGen extends QCodeGenBase {
    const TemplatesPathCustom = '/../_devtools/codegen/templates/';

    /**
     * permite la pluralización de palabras al castellano
     * La primera regla dice:
     * "Todas las palabras que terminen en t, a, e, i, o, u
     *  se pluralizan con S", mientras que la segunda
     *  regla dice: "Todas las palabras que terminen en r, l, n, d
     *  se pluralizan con ES"
     * @param <string> $strName
     * @return <string>
     */
    protected function Pluralize($strName) {
    // Special Rules go Here
		/*	switch (true) {
				case (strtolower($strName) == 'play'):
					return $strName . 's';
			}        */
	$finishesWithSArray =  array('t','a','e','i','u');
	$finishesWithEsArray = array('r','l','n','d');
	if (in_array(QString::LastCharacter($strName),$finishesWithSArray)) {
	    return $strName .'s';
	} else if (in_array(QString::LastCharacter($strName),$finishesWithEsArray)) {
		return $strName .'es';
	    } else {
		return parent::Pluralize($strName);
	    }
    }

    /**
     * Removes codegen generated tpls
     */
    public static function Clean() {
	foreach(new DirectoryIterator(__CODEGEN_DIR__.'/templates/db_orm/class_gen') as $file) {
	    if(substr($file->getFilename(), 0, 2)=='__') {
		unlink($file->getPathname());
	    }
	}
    }


    public static function doBackup() {
        for ($intIndex = 0; $intIndex <= 9; $intIndex++) {
            $strConstantName = sprintf('DB_CONNECTION_%s', $intIndex);

            if (defined($strConstantName)) {
            // Expected Keys to be Set
            $strExpectedKeys = array(
                'adapter', 'server', 'port', 'database',
                'username', 'password', 'profiling', 'backupfile'
            );

            // Lookup the Serialized Array from the DB_CONFIG constants and unserialize it
            $strSerialArray = constant($strConstantName);
            $objConfigArray = unserialize($strSerialArray);

            // Set All Expected Keys
            foreach ($strExpectedKeys as $strExpectedKey)
                if (!array_key_exists($strExpectedKey, $objConfigArray))
                $objConfigArray[$strExpectedKey] = null;

            if (!$objConfigArray['adapter'])
                throw new Exception('No Adapter Defined for ' . $strConstantName . ': ' . var_export($objConfigArray, true));

            if (false && !$objConfigArray['server'])
                throw new Exception('No Server Defined for ' . $strConstantName . ': ' . constant($strConstantName));

            $strDatabaseType = 'Q' . $objConfigArray['adapter'] . 'Database';
            if (!class_exists($strDatabaseType)) {
                $strDatabaseAdapter = sprintf('%s/database/%s.class.php', __QCODO_CORE__, $strDatabaseType);
                if (!file_exists($strDatabaseAdapter))
                throw new Exception('Database Type is not valid: ' . $objConfigArray['adapter']);
                require($strDatabaseAdapter);
            }
//            $strDatabaseType .= 'Backup';
//            $objDatabaseBackup = new $strDatabaseType($intIndex, $objConfigArray);
//            $objDatabaseBackup->Backup();
            }
        }
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
        if ($blnOverrideFlag)
            $strTemplateFilePath = __QCODO__ . QCodeGen::TemplatesPathCustom . $strModuleName . '/' . $strFilename;
        else
            $strTemplateFilePath = __QCODO_CORE__ . QCodeGen::TemplatesPath . $strModuleName . '/' . $strFilename;

        // Setup Debug/Exception Message
        if (QCodeGen::DebugMode)
            _p("Evaluating $strTemplateFilePath<br/>", false);
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
        } catch (Exception $objExc) {
            
        }

        if (is_null($objTemplateXml) || (!($objTemplateXml instanceof SimpleXMLElement)))
            throw new Exception($strError);

        $blnOverwriteFlag = QType::Cast($objTemplateXml['OverwriteFlag'], QType::Boolean);
        $blnDocrootFlag = QType::Cast($objTemplateXml['DocrootFlag'], QType::Boolean);
        $strTargetDirectory = QType::Cast($objTemplateXml['TargetDirectory'], QType::String);
        $strDirectorySuffix = QType::Cast($objTemplateXml['DirectorySuffix'], QType::String);
        $strTargetFileName = QType::Cast($objTemplateXml['TargetFileName'], QType::String);

        //Me salteo la generación de código de controladores, helpers y views de las tablas Tipo
        if (strpos($strTargetFileName, 'Tipo') && 
            (strpos($strTargetDirectory, 'controller') || strpos($strTargetDirectory, 'helper') || strpos($strTargetDirectory, 'view')))
                return true;
                
        
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

require(__QCODO_CORE__ . '/codegen/library.inc.php');
?>
