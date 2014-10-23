<?php
require __MODEL_DIR__. '/autoload/generated/_class_paths_gen.inc.php';
require __MODEL_DIR__. '/autoload/_cuadros_paths.inc.php';
// This file is where you should put your manually added files

QApplication::$ClassFile['errornotfoundpanel'] = __CONTROLLER_DIR__.'/error/ErrorNotfoundPanel.class.php';
QApplication::$ClassFile['pagehomepanel'] = __CONTROLLER_DIR__.'/page/PageHomePanel.class.php';
QApplication::$ClassFile['pagetestpanel'] = __CONTROLLER_DIR__.'/page/PageTestPanel.class.php';
QApplication::$ClassFile['pageinstrumentospanel'] = __CONTROLLER_DIR__.'/page/PageInstrumentosPanel.class.php';
QApplication::$ClassFile['qqn'] = __MODEL_DIR__.'/orm/generated/QQN.class.php';

QApplication::$ClassFile['columna'] = __MODEL_DIR__.'/Columna.class.php';
QApplication::$ClassFile['fila'] = __MODEL_DIR__.'/Fila.class.php';
QApplication::$ClassFile['celda'] = __MODEL_DIR__.'/Celda.class.php';

QApplication::$ClassFile['cuadrobase'] = __MODEL_DIR__.'/CuadroBase.class.php';
QApplication::$ClassFile['cuadroinfinitobase'] = __MODEL_DIR__.'/CuadroInfinitoBase.class.php';
QApplication::$ClassFile['cuadrofijobase'] = __MODEL_DIR__.'/CuadroFijoBase.class.php';


QApplication::$ClassFile['adminconflictospanel'] = __CONTROLLER_DIR__.'/admin/AdminConflictosPanel.class.php';
QApplication::$ClassFile['admintotalespanel'] = __CONTROLLER_DIR__.'/admin/AdminTotalesPanel.class.php';
QApplication::$ClassFile['cargaindexpanel'] = __CONTROLLER_DIR__.'/carga/CargaIndexPanel.class.php';
QApplication::$ClassFile['cargabajaindexpanel'] = __CONTROLLER_DIR__.'/cargabaja/CargaBajaIndexPanel.class.php';
QApplication::$ClassFile['datoscapituloverificarpanel'] = __CONTROLLER_DIR__.'/datoscapitulo/DatosCapituloVerificarPanel.class.php';
//QApplication::$ClassFile['carga'] = __HELPER_DIR__.'/carga/Carga.class.php';


QApplication::$ClassFile['classnotexistexception'] = __EXCEPTIONS_DIR__.'/ClassNotExistException.class.php';
QApplication::$ClassFile['migrationexception'] = __EXCEPTIONS_DIR__.'/MigrationException.class.php';
QApplication::$ClassFile['numberoutofrangeexception'] = __EXCEPTIONS_DIR__.'/NumberOutOfRangeException.class.php';
QApplication::$ClassFile['tipodatoerrorexception'] = __EXCEPTIONS_DIR__.'/TipoDatoErrorException.class.php';
QApplication::$ClassFile['imposiblemodificarcuadernilloconfirmadoexception'] = __EXCEPTIONS_DIR__.'/ImposibleModificarCuadernilloConfirmadoException.class.php';
QApplication::$ClassFile['cuadernillodesconfirmadoexception'] = __EXCEPTIONS_DIR__.'/CuadernilloDesconfirmadoException.class.php';

QApplication::$ClassFile['estadocuadernilloindexpanel'] = __CONTROLLER_DIR__.'/estadocuadernillo/EstadoCuadernilloIndexPanel.class.php';

//QApplication::$ClassFile['inputhelper'] = __HELPER_DIR__.'/InputHelper.class.php';
//QApplication::$ClassFile['classnotexistexception'] = __EXCEPTIONS_DIR__.'/ClassNotExistException.class.php';
QApplication::$ClassFile['celdacontrol'] = __HELPER_DIR__.'/input/CeldaControl.class.php';
QApplication::$ClassFile['usuariologinpanel'] = __CONTROLLER_DIR__.'/usuario/UsuarioLoginPanel.class.php';

QApplication::$ClassFile['errorconsistencia'] = __MODEL_DIR__.'/ErrorConsistencia.class.php';
QApplication::$ClassFile['inconsistencia'] = __MODEL_DIR__.'/Inconsistencia.class.php';
QApplication::$ClassFile['inconsistenciaerror'] = __MODEL_DIR__.'/Inconsistencia.class.php';
QApplication::$ClassFile['inconsistenciaadvertencia'] = __MODEL_DIR__.'/Inconsistencia.class.php';
QApplication::$ClassFile['inconsistenciafaltante'] = __MODEL_DIR__.'/Inconsistencia.class.php';

QApplication::$ClassFile['tipodatonewpanel'] = __CONTROLLER_DIR__.'/tipodato/TipoDatoNewPanel.class.php';

QApplication::$ClassFile['definicioncolumnaeditpanel'] = __CONTROLLER_DIR__.'/definicioncolumna/DefinicionColumnaEditPanel.class.php';
QApplication::$ClassFile['datoscuadernilloverificarpanel'] = __CONTROLLER_DIR__.'/datoscuadernillo/DatosCuadernilloVerificarPanel.class.php';
QApplication::$ClassFile['datoscuadernilloconstanciapanel'] = __CONTROLLER_DIR__.'/datoscuadernillo/DatosCuadernilloConstanciaPanel.class.php';
QApplication::$ClassFile['datoscuadernilloimpresionpanel'] = __CONTROLLER_DIR__.'/datoscuadernillo/DatosCuadernilloImpresionPanel.class.php';



QApplication::$ClassFile['loginindexpanel'] = __CONTROLLER_DIR__.'/login/LoginIndexPanel.class.php';
QApplication::$ClassFile['logoutindexpanel'] = __CONTROLLER_DIR__.'/login/LogoutIndexPanel.class.php';
QApplication::$ClassFile['cuadernilloindexpanel'] = __CONTROLLER_DIR__.'/cuadernillo/CuadernilloIndexPanel.class.php';
QApplication::$ClassFile['codigosindexpanel'] = __CONTROLLER_DIR__.'/codigos/CodigosIndexPanel.class.php';
QApplication::$ClassFile['codigoseditpanel'] = __CONTROLLER_DIR__.'/codigos/CodigosEditPanel.class.php';
QApplication::$ClassFile['tipodatotypedatagrid'] = __HELPER_DIR__.'/tipodatotype/TipoDatoTypeDataGrid.class.php';
//QApplication::$ClassFile['confirmaciondesconfirmarpanel'] = __CONTROLLER_DIR__.'/confirmacion/ConfirmacionDesconfirmarPanel.class.php';


// helpers de library
QApplication::$ClassFile['authenticationbase'] = __QCODO_CORE__ .'/../AuthenticationBase.class.php';
QApplication::$ClassFile['authentication'] = __HELPER_DIR__  .'/Authentication.class.php';
QApplication::$ClassFile['permissionbase'] = __QCODO_CORE__ .'/../PermissionBase.class.php';
QApplication::$ClassFile['permission'] = __HELPER_DIR__  .'/Permission.class.php';
QApplication::$ClassFile['sessionbase'] = __QCODO_CORE__ .'/../SessionBase.class.php';
QApplication::$ClassFile['session'] = __HELPER_DIR__ .'/Session.class.php';
QApplication::$ClassFile['sistemaoperativobase'] = __QCODO_CORE__ . '/../SistemaOperativoBase.class.php';


QApplication::$ClassFile['errorcontrollerprohibidoexception'] = __EXCEPTIONS_DIR__ .'/ErrorControllerProhibidoException.class.php';

QApplication::$ClassFile['proyectoblockeadopanel'] = __CONTROLLER_DIR__ .'/page/ProyectoBlockeadoPanel.class.php';
QApplication::$ClassFile['proyectobloqueadopanel'] = __CONTROLLER_DIR__ .'/page/ProyectoBloqueadoPanel.class.php';

QApplication::$ClassFile['qprocessinicializardesdepadron'] = __HELPER_DIR__.'/QProcessInicializarDesdePadron.class.php';
QApplication::$ClassFile['qprocessinicializardesdepadronstate'] = __HELPER_DIR__.'/QProcessInicializarDesdePadron.class.php';
QApplication::$ClassFile['qprocessmigracionoltp'] = __HELPER_DIR__.'/QProcessMigracionoltp.class.php';
QApplication::$ClassFile['qprocessmigracionoltpstate'] = __HELPER_DIR__.'/QProcessMigracionoltp.class.php';

QApplication::$ClassFile['qprocessmodelogeneradorstate'] = __HELPER_DIR__.'/QProcessModeloGenerador.class.php';
QApplication::$ClassFile['qprocessmodelogenerador'] = __HELPER_DIR__.'/QProcessModeloGenerador.class.php';

QApplication::$ClassFile['qprocessimportardatosstate'] = __HELPER_DIR__.'/QProcessImportarDatos.class.php';
QApplication::$ClassFile['qprocessimportardatos'] = __HELPER_DIR__.'/QProcessImportarDatos.class.php';

QApplication::$ClassFile['qprocessimportardatoslocalizacionstate'] = __HELPER_DIR__.'/QProcessImportarDatosLocalizacion.class.php';
QApplication::$ClassFile['qprocessimportardatoslocalizacion'] = __HELPER_DIR__.'/QProcessImportarDatosLocalizacion.class.php';

QApplication::$ClassFile['raanteriorwebserviceclient'] = __HELPER_DIR__.'/RaAnteriorWebServiceClient.class.php';

QApplication::$ClassFile['cuadernilloanalizardatagrid'] = __HELPER_DIR__.'/cuadernillo/CuadernilloAnalizarDataGrid.class.php';
QApplication::$ClassFile['datoscuadernilloconfirmaciondatagrid'] = __HELPER_DIR__.'/datoscuadernillo/DatosCuadernilloConfirmacionDataGrid.class.php';

QApplication::$ClassFile['localizacioncheckdatagrid'] = __HELPER_DIR__.'/localizacion/LocalizacionCheckDataGrid.class.php';
QApplication::$ClassFile['localizacioncustomdatagrid'] = __CONTROLLER_DIR__.'/localizacion/LocalizacionCustomDataGrid.class.php';

QApplication::$ClassFile['migracionbase'] = __MODEL_DIR__.'/migraciones/MigracionBase.class.php';
QApplication::$ClassFile['migracionmatriculabase'] = __MODEL_DIR__.'/migraciones/MigracionMatriculaBase.class.php';

QApplication::$ClassFile['datoscuadrofaltantedatagrid'] = __HELPER_DIR__.'/datoscuadro/DatosCuadroFaltanteDataGrid.class.php';
QApplication::$ClassFile['listadosdatosfaltantespanel'] = __CONTROLLER_DIR__.'/listados/ListadosDatosfaltantesPanel.class.php';

QApplication::$ClassFile['listadoscuadrossininformacionpanel'] = __CONTROLLER_DIR__.'/listados/ListadosCuadrossininformacionPanel.class.php';

QApplication::$ClassFile['downloadexcel'] = __HELPER_DIR__.'/DownloadExcel.class.php';
QApplication::$ClassFile['adminvalidacionpanel'] = __CONTROLLER_DIR__.'/admin/AdminValidacionPanel.class.php';
QApplication::$ClassFile['datoscuadroerroresdatagrid'] = __HELPER_DIR__.'/datoscuadro/DatosCuadroErroresDataGrid.class.php';

QApplication::$ClassFile['fichaescuelaindexpanel'] = __CONTROLLER_DIR__.'/fichaescuela/FichaEscuelaIndexPanel.class.php';
QApplication::$ClassFile['qprocessarticularlocalizacionestest'] = __HELPER_DIR__.'/QProcessArticularLocalizacionTest.class.php';
QApplication::$ClassFile['qprocessarticularlocalizaciontest'] = __HELPER_DIR__.'/QProcessArticularLocalizacionTest.class.php';
QApplication::$ClassFile['errorreportarpanel'] = __CONTROLLER_DIR__.'/error/ErrorReportarPanel.class.php';

QApplication::$ClassFile['personalestablecimientonewpanel'] = __CONTROLLER_DIR__.'/personalestablecimiento/PersonalEstablecimientoNewPanel.class.php';
QApplication::$ClassFile['personalbuscardatagrid'] = __HELPER_DIR__.'/personal/PersonalBuscarDataGrid.class.php';

QApplication::$ClassFile['personalrepetidodatagrid'] = __HELPER_DIR__.'/personal/PersonalRepetidoDataGrid.class.php';

QApplication::$ClassFile['bloque12panel'] = __CONTROLLER_DIR__.'/bloque/Bloque12Panel.class.php';
QApplication::$ClassFile['bloque11panel'] = __CONTROLLER_DIR__.'/bloque/Bloque11Panel.class.php';
QApplication::$ClassFile['bloque10panel'] = __CONTROLLER_DIR__.'/bloque/Bloque10Panel.class.php';
QApplication::$ClassFile['bloque9panel'] = __CONTROLLER_DIR__.'/bloque/Bloque9Panel.class.php';
QApplication::$ClassFile['bloque8panel'] = __CONTROLLER_DIR__.'/bloque/Bloque8Panel.class.php';
QApplication::$ClassFile['bloque7panel'] = __CONTROLLER_DIR__.'/bloque/Bloque7Panel.class.php';
QApplication::$ClassFile['bloque6panel'] = __CONTROLLER_DIR__.'/bloque/Bloque6Panel.class.php';
QApplication::$ClassFile['bloque5panel'] = __CONTROLLER_DIR__.'/bloque/Bloque5Panel.class.php';
QApplication::$ClassFile['bloque4panel'] = __CONTROLLER_DIR__.'/bloque/Bloque4Panel.class.php';
QApplication::$ClassFile['bloque3panel'] = __CONTROLLER_DIR__.'/bloque/Bloque3Panel.class.php';
QApplication::$ClassFile['bloque2panel'] = __CONTROLLER_DIR__.'/bloque/Bloque2Panel.class.php';
QApplication::$ClassFile['bloque1panel'] = __CONTROLLER_DIR__.'/bloque/Bloque1Panel.class.php';
QApplication::$ClassFile['bloque6intropanel'] = __CONTROLLER_DIR__.'/bloque/Bloque6IntroPanel.class.php';
QApplication::$ClassFile['bloque7intropanel'] = __CONTROLLER_DIR__.'/bloque/Bloque7IntroPanel.class.php';
QApplication::$ClassFile['bloque8intropanel'] = __CONTROLLER_DIR__.'/bloque/Bloque8IntroPanel.class.php';
QApplication::$ClassFile['bloquebase'] = __CONTROLLER_DIR__.'/BloqueBase.class.php';
QApplication::$ClassFile['paginacontrolpanel'] = __CONTROLLER_DIR__.'/PaginaControlPanel.class.php';
QApplication::$ClassFile['pagina12panel'] = __CONTROLLER_DIR__.'/pagina/Pagina12Panel.class.php';
QApplication::$ClassFile['pagina11panel'] = __CONTROLLER_DIR__.'/pagina/Pagina11Panel.class.php';
QApplication::$ClassFile['pagina10panel'] = __CONTROLLER_DIR__.'/pagina/Pagina10Panel.class.php';
QApplication::$ClassFile['pagina9panel'] = __CONTROLLER_DIR__.'/pagina/Pagina9Panel.class.php';
QApplication::$ClassFile['pagina8panel'] = __CONTROLLER_DIR__.'/pagina/Pagina8Panel.class.php';
QApplication::$ClassFile['pagina7panel'] = __CONTROLLER_DIR__.'/pagina/Pagina7Panel.class.php';
QApplication::$ClassFile['pagina6panel'] = __CONTROLLER_DIR__.'/pagina/Pagina6Panel.class.php';
QApplication::$ClassFile['pagina5panel'] = __CONTROLLER_DIR__.'/pagina/Pagina5Panel.class.php';
QApplication::$ClassFile['pagina4panel'] = __CONTROLLER_DIR__.'/pagina/Pagina4Panel.class.php';
QApplication::$ClassFile['pagina3panel'] = __CONTROLLER_DIR__.'/pagina/Pagina3Panel.class.php';
QApplication::$ClassFile['pagina2panel'] = __CONTROLLER_DIR__.'/pagina/Pagina2Panel.class.php';
QApplication::$ClassFile['pagina1panel'] = __CONTROLLER_DIR__.'/pagina/Pagina1Panel.class.php';

QApplication::$ClassFile['qconfirmdialogbox'] = __HELPER_DIR__.'/qform/QConfirmDialogBox.class.php';
QApplication::$ClassFile['qcaptchatextbox'] = __HELPER_DIR__.'/qform/QCaptchaTextBox.class.php';
QApplication::$ClassFile['qcaptchaimage'] = __HELPER_DIR__.'/qform/QCaptchaImage.class.php';
QApplication::$ClassFile['qcaptchafilters'] = __HELPER_DIR__.'/qform/QCaptchaFilters.class.php';

QApplication::$ClassFile['dato'] = __MODEL_DIR__.'/Dato.class.php';

QApplication::$ClassFile['consistenciabase'] = __HELPER_DIR__.'/consistencias/ConsistenciaBase.class.php';
QApplication::$ClassFile['consistencia1'] = __HELPER_DIR__.'/consistencias/Consistencia1.class.php';
QApplication::$ClassFile['consistencia2'] = __HELPER_DIR__.'/consistencias/Consistencia2.class.php';
QApplication::$ClassFile['consistencia3'] = __HELPER_DIR__.'/consistencias/Consistencia3.class.php';
QApplication::$ClassFile['consistencia4'] = __HELPER_DIR__.'/consistencias/Consistencia4.class.php';
QApplication::$ClassFile['consistencia5'] = __HELPER_DIR__.'/consistencias/Consistencia5.class.php';
QApplication::$ClassFile['consistencia6'] = __HELPER_DIR__.'/consistencias/Consistencia6.class.php';
QApplication::$ClassFile['consistencia7'] = __HELPER_DIR__.'/consistencias/Consistencia7.class.php';
QApplication::$ClassFile['consistencia8'] = __HELPER_DIR__.'/consistencias/Consistencia8.class.php';
QApplication::$ClassFile['consistencia9'] = __HELPER_DIR__.'/consistencias/Consistencia9.class.php';
QApplication::$ClassFile['activeresource'] = __HELPER_DIR__ .'/ActiveResource.php';
QApplication::$ClassFile['issue'] = __HELPER_DIR__ .'/Issue.php';
QApplication::$ClassFile['inputhelper'] = __HELPER_DIR__ .'/InputHelper.class.php';
