<?php
// Include prepend.inc to load Qcubed
require('../app/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
// require('prepend.inc.php');				/* if you DO have "includes/" in your include_path */
// Load in the QCodeGen Class
require('codegen/CuadrosCodeGen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();

/////////////////////////////////////////////////////
// Run CodeGen, using the ./codegen_settings.xml file
/////////////////////////////////////////////////////
CuadrosCodeGen::Run(dirname(__FILE__) . '/codegen_settings.xml');

$codegen = new CuadrosCodeGen();

if (isset ($_GET['id'])) {
    $codegen->GenerateConsistenciaById($_GET['id']);
}
else {
    $codegen->GenerateConsistencias();
}




?>