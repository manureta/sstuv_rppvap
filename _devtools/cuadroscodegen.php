<?php
set_time_limit(0);
// Include prepend.inc to load Qcubed
require('../app/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
// require('prepend.inc.php');				/* if you DO have "includes/" in your include_path */
// Load in the QCodeGen Class
require('codegen/CuadrosCodeGen.class.php');

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
QApplication::CheckRemoteAdmin();
umask('0002');
/////////////////////////////////////////////////////
// Run CodeGen, using the ./codegen_settings.xml file
/////////////////////////////////////////////////////
CuadrosCodeGen::Run(dirname(__FILE__) . '/codegen_settings.xml');

$codegen = new CuadrosCodeGen();

if (isset ($_GET['id'])) {
    $codegen->GenerateById($_GET['id']);
}
else {
    $codegen->GenerateAll();
    // Hack para regenerar una localizacion con todos los datos{cuadernillo,capitulo,cuadro} 
//     $strCue = '998880010'; // Cueanexo === IdLocalizacion para estas localizaciones de prueba
//     $objLocalizacion = Localizacion::Load($strCue);
//     if($objLocalizacion){
//         $objLocalizacion->DeleteAllDatosCuadernillosAsId();
//         $objLocalizacion->Delete();
//     }
//     $objOLTPLocalizacion = OLTPLocalizacion::Load($strCue);
//     if($objOLTPLocalizacion){
//         $objOLTPLocalizacion->DeleteAllDatosCuadernillosAsId();
//         $objOLTPLocalizacion->Delete();
//     }
//     $objOLTPEstablecimiento = OLTPEstablecimiento::Load($strCue);
//     if($objOLTPEstablecimiento){
//         $objOLTPEstablecimiento->Delete();
//     }
//     
//     $objLocalizacion = new Localizacion();
//     $objLocalizacion->Cueanexo = $strCue;
//     $objLocalizacion->IdLocalizacion = $strCue;
//     $objLocalizacion->Nombre = 'Actualizada con todos los cuadernillos';
//     $objLocalizacion->CEstado = 1;
//     $objLocalizacion->Save();
//     
//     
//     /*
//      *   cue 
//   nombre 
//   c_sector
//   c_dependencia 
//   fecha_creacion
//   c_confesional 
//   c_arancelado 
//   c_categoria 
//      * 
//      * 
//      */
//     $objOLTPEstablecimiento = new OLTPEstablecimiento();
//     $objOLTPEstablecimiento->Cue = "9988800";
//     $objOLTPEstablecimiento->Nombre = "9988800";
//     $objOLTPEstablecimiento->CSector = "9988800";
//     $objOLTPEstablecimiento->CDependencia = "9988800";
//     $objOLTPEstablecimiento->FechaCreacion = "9988800";
//     $objOLTPEstablecimiento->CConfesional = "9988800";
//     $objOLTPEstablecimiento->CArancelado = "9988800";
//     $objOLTPEstablecimiento->CCategoria = "9988800";
//     
//     
//     $objOLTPLocalizacion = new OLTPLocalizacion();
//     
//     
//     
//     foreach(DefinicionCuadernillo::LoadAll() as $objCuadernillo) {
//         foreach($objCuadernillo->DefinicionCapituloAsIdArray as $objCapitulo) {
//             foreach($objCapitulo->DefinicionPaginaAsIdArray as $objPagina) {
//                 foreach($objPagina->DefcuadroDefpaginaAsIdArray as $objDefcuadroDefpagina) {
//                     DatosCuadro::CrearDatosCuadroWithCueanexoCuadernillo($strCue, $objCuadernillo->NombreCorto, $objDefcuadroDefpagina->IdDefinicionCuadroObject->Numero);
//                 }
//             }
//         }
//     }
}




?>
