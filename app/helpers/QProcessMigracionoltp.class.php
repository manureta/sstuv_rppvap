<?php

function QProcessMigracionOltpHandleError($__exc_errno, $__exc_errstr, $__exc_errfile, $__exc_errline, $__exc_errcontext) {
    if ($__exc_errno == E_STRICT) return true;
    LogHelper::Error(sprintf('Error Migrando: %s | file: %s line: %s context: %s', 
            $__exc_errstr, $__exc_errfile, $__exc_errline, print_r($__exc_errcontext,true)));
    return true;
}

class QProcessMigracionOltp extends QProcess {
    
    public static $_CANTIDAD_PROCESOS = 4;

    public function __construct() {
        $this->objQProcessState = QProcessMigracionOltpState::Get();
    }

    public function Work() {
        set_time_limit(0);
        $this->objQProcessState->Estado = 'run';
        $this->objQProcessState->Descripcion = 'Comenzando migración...';
        $this->objQProcessState->Total = Localizacion::CountAll();
        $this->objQProcessState->Migrados = 0;
        $this->objQProcessState->Error = 0;
        $this->objQProcessState->TotalDone = 0;
        $this->objQProcessState->Save();
        LogHelper::Log("Iniciando proceso de migración a OLTP");
        $blnSoloConfirmados = $this->objQProcessState->SoloConfirmados;
        $blnBorrarPlanes = $this->objQProcessState->BorrarPlanes;
        $offset = 0;
        set_error_handler('QProcessMigracionOltpHandleError');
        $objDatabase = OLTPTitulo::GetDatabase();
        try {
            if (file_exists(__TMP_DIR__.'/ultima_migracion'))
                unlink(__TMP_DIR__.'/ultima_migracion');
            LogHelper::ResetLog('migracion_oltp.log');
            LogHelper::Debug("Limpiando las tablas OLTP");
            OLTPTitulo::Reset();
            LogHelper::Debug("Borrando plan_estudio_local_secundaria, plan_estudio_local_superior, plan_estudio_local con id_plan_estudio_local < 10000000");
            $this->CorrerSql("select correccion_migracion_limpiar_oltp();", 'Limpiando OLTP...');
            //$this->CorrerSql("DELETE FROM plan_estudio_local_secundaria WHERE id_plan_estudio_local < 10000000", 'Limpiando planes de la última migración...');
            //$this->CorrerSql("DELETE FROM plan_estudio_local_superior WHERE id_plan_estudio_local < 10000000", 'Limpiando planes de la última migración...');
            //$this->CorrerSql("DELETE FROM plan_estudio_local WHERE id_plan_estudio_local < 10000000", 'Limpiando planes de la última migración...');
            //$this->CorrerSql("TRUNCATE bibliotecas, caracteristicas, actividades, funciona_en, beneficiarios, sistema_gestion, secciones_multinivel, provenientes_alfabetizacion, seccion, oferta_dictada CASCADE;", 'Limpiando datos de la última migración...');
            //OLTPSeccion::Truncate(true);
            //OLTPOfertaDictada::Truncate(true);
            $objProvincia = OLTPProvinciaTipo::Load(__COD_PROV__);
            $arrSeq = array('oferta_dictada_id_oferta_dictada_seq',
                            'plan_dictado_id_plan_dictado_seq',
                            'seccion_id_seccion_seq',
                            'titulo_id_titulo_seq',
                            'titulo_oferta_id_titulo_oferta_seq');
            foreach ($arrSeq as $seq) { 
                $strQuery = "SELECT setval('$seq', {$objProvincia->SeqMin});";
                $this->CorrerSql($strQuery);
            }
            // Corrijo estructura errónea a partir de errores de articulación
            $this->CorrerSql("select correccion_migracion_existencia();", 'Borrando datos de OLTP que no tienen la estructura completa...');
            // Borro Localizaciones sin ofertas
            //$this->CorrerSql('DELETE FROM loc_campo_prov_valor WHERE id_localizacion NOT IN (SELECT id_localizacion FROM oferta_local);','Borrando Localizaciones sin Oferta Local...');
            //$this->CorrerSql('DELETE FROM localizacion_domicilio WHERE id_localizacion NOT IN (SELECT id_localizacion FROM oferta_local);');
            //$this->CorrerSql('DELETE FROM localizacion WHERE id_localizacion NOT IN (SELECT id_localizacion FROM oferta_local);');
            //// Borro Establecimientos sin Localizaciones
            //$this->CorrerSql('DELETE FROM establecimiento WHERE id_establecimiento NOT IN (SELECT id_establecimiento FROM localizacion);', 'Borrando Establecimientos sin Localizaciones...');
            //$this->CorrerSql('UPDATE localizacion SET sede=true FROM (select id_establecimiento as id, min(anexo) FROM localizacion
            //        WHERE NOT sede AND id_establecimiento NOT IN (SELECT id_establecimiento FROM localizacion WHERE sede) group by 1) a 
            //        WHERE a.id=id_establecimiento AND a.min=anexo;', 'Corrigiendo Sede para única Localización...');
            
            // Corrijo los Estados de forma que queden coherentes
            $this->CorrerSql("select correccion_migracion_estados();", 'Corrigiendo Estados...');
            //$this->CorrerSql('
            //        UPDATE localizacion SET c_estado=estado_correcto, fecha_baja = CASE WHEN fecha_baja IS NOT NULL AND estado_correcto IN (1,2,4) THEN NULL ELSE fecha_baja END
            //        FROM (SELECT id_localizacion, CASE WHEN min(c_estado) IN (1,2) THEN min(c_estado) WHEN max(c_estado)=4 THEN 4 ELSE 3 END as estado_correcto FROM oferta_local GROUP BY 1) x
            //        WHERE localizacion.id_localizacion=x.id_localizacion AND c_estado!=estado_correcto;', 'Corrigiendo Estados en Localizaciones...');
            //$this->CorrerSql('
            //        UPDATE establecimiento SET c_estado=estado_correcto, fecha_baja = CASE WHEN fecha_baja IS NOT NULL AND estado_correcto IN (1,2,4) THEN NULL ELSE fecha_baja END
            //        FROM (SELECT id_establecimiento, CASE WHEN min(c_estado) IN (1,2) THEN min(c_estado) WHEN max(c_estado)=4 THEN 4 ELSE 3 END as estado_correcto FROM localizacion GROUP BY 1) x
            //        WHERE establecimiento.id_establecimiento=x.id_establecimiento AND c_estado!=estado_correcto;', 'Corrigiendo Estados en Establecimientos...');
            
            $limit = 20;
            $intIdLocalizacionArray = array();
            // inicializo array de arrays con datos cuadernillos
            LogHelper::Debug("inicializo arrays con id localizaciones para los procesos hijos: ". self::$_CANTIDAD_PROCESOS);            
            for($i=0;$i<self::$_CANTIDAD_PROCESOS;$i++)
                $intIdLocalizacionArray[$i] = array();        
            $i=0;
            LogHelper::Debug("cargo arrays con id localizaciones para los procesos hijos");
            while ($offset < $this->objQProcessState->Total) {
                $objLocalizacionArray = Localizacion::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Localizacion()->IdLocalizacion), QQ::LimitInfo($limit, $offset)));
                foreach ($objLocalizacionArray as $objLocalizacion) {
                    array_push($intIdLocalizacionArray[$i%self::$_CANTIDAD_PROCESOS],$objLocalizacion->IdLocalizacion);
                    $i++;
                }            
                $offset+=$limit;
            }
            LogHelper::Debug("creo los procesos hijos.");
            $this->objQProcessState->arrToProc = array();
            foreach ($intIdLocalizacionArray as $i => $arrLoc) {
                LogHelper::Debug('Inicializando Proceso '.$i);
                $this->objQProcessState->arrToProc[] = new QProcessMigracionOltpWorker($i,$arrLoc,$blnSoloConfirmados);
            }
            LogHelper::Debug('Procesos inicializados');
            //$this->objQProcessState->arrLocalizaciones = null;
            $this->objQProcessState->Descripcion = sprintf('Lanzando %d procesos...',count($this->objQProcessState->arrToProc));
            $this->objQProcessState->arrProcRunning = array();
            $this->objQProcessState->arrFinished = array();
            $this->objQProcessState->arrErrors = array();
            $this->objQProcessState->Save();
            try {
                $arrFails = array();
                foreach ($this->objQProcessState->arrToProc as $QProc) {
                    array_push($this->objQProcessState->arrProcRunning, $QProc);
                    LogHelper::Debug("Ejecutando el proceso ".$QProc->ProcessState->strProcessid);
                    $QProc->Run();
                    $arrFails[$QProc->ProcessState->strProcessid] = 0;
                    $this->objQProcessState->Save();
                }
                sleep(self::$_CANTIDAD_PROCESOS);
                $blnError = false;
                LogHelper::Debug('Corriendo '.count($this->objQProcessState->arrProcRunning).' procesos');
                $this->objQProcessState->Descripcion = 'Corriendo procesos de migración...';
                while (true) {
                    LogHelper::Debug("entro al while");
                    $this->objQProcessState->TotalDone = 0;
                    $this->objQProcessState->Migrados = 0;
                    foreach ($this->objQProcessState->arrProcRunning as $k => $objProcMigracionOltpWorker) {
                        try {$objProcMigracionOltpWorker->UpdateState();} 
                        catch (QProcessException $e) {if ($e->getCode()==1) continue; else throw $e;}

                        if (time() - $objProcMigracionOltpWorker->ProcessState->lastupdate > 480) { // si no actualizó el estado en 8 min lo doy por muerto...
                            $objProcMigracionOltpWorker->ProcessState->Estado = 'err';
                            $objProcMigracionOltpWorker->ProcessState->Error = "Se terminó el tiempo de espera para determinar el estado de uno de los procesos de migración.\r\nEs probable que el proceso haya finalizado de forma imprevista.";
                            LogHelper::Error("Finalizó inesperadamente un QProcessMigracionOltpWorker");
                        }

                        LogHelper::Debug("estado: " . $objProcMigracionOltpWorker->ProcessState->Estado);
                        switch ($objProcMigracionOltpWorker->ProcessState->Estado) {
                            case 'err':
                                LogHelper::Debug("El proceso {$k} tiene estado err");
                                // FIXME: el valor guardado en Error es un array con los errores o la cantidad de errores que ocurrieron?
                                // ?? $this->objQProcessState->Error += $objProcMigracionOltpWorker->ProcessState->Error;
                                array_push($this->objQProcessState->arrErrors, $objProcMigracionOltpWorker->ProcessState->Error);
                                $blnError = true;
                                unset($this->objQProcessState->arrProcRunning[$k]);
                                $this->objQProcessState->Save();
                                if (count($this->objQProcessState->arrProcRunning) == 0) break 3;
                                else break;
                            // fall trough
                            case 'fin':
                                LogHelper::Debug("El proceso {$k} finalizó");
                                array_push($this->objQProcessState->arrFinished, $objProcMigracionOltpWorker);
                                $this->objQProcessState->arrProcRunning[$k] = null;
                                unset($this->objQProcessState->arrProcRunning[$k]);
                                // ?? $this->objQProcessState->Error += $objProcMigracionOltpWorker->ProcessState->Error;
                                $this->objQProcessState->Save();
                                if (count($this->objQProcessState->arrProcRunning) == 0) {
                                    LogHelper::Debug("Finalizaron todos los procesos");
                                    $this->objQProcessState->TotalDone = $this->objQProcessState->Total;
                                    $this->objQProcessState->Save();
                                    break 3;
                                }
                        }
                    }
                    $this->objQProcessState->TotalDone = 0;
                    foreach ($this->objQProcessState->arrToProc as $objProcess) {
                        $this->objQProcessState->TotalDone += $objProcess->ProcessState->TotalDone;
                    }
                    
                    LogHelper::Debug("TotalDone: ".$this->objQProcessState->TotalDone);
                    $this->objQProcessState->Save();
                    sleep(2);
                }
                $this->objQProcessState->Estado = ($blnError) ? 'err' : 'fin';
                $this->objQProcessState->Save();
                LogHelper::Debug("terminó la ejecución de la migracion.");
            }
            catch (Exception $e) {
                $this->objQProcessState->Estado = 'err';
                array_push($this->objQProcessState->arrErrors, $e->getMessage());
                $this->objQProcessState->Save();
            }
        } catch (Exception $e) {
            $msj = sprintf('Se produjo una excepción no esperada durante la migración: %s', $e->getMessage());
            LogHelper::Log($msj,'migracion_oltp.log');
            LogHelper::Error("$msj \n {$e->getTraceAsString()}");
            $objDatabase->TransactionRollback();
            $this->objQProcessState->Error++;
            $this->objQProcessState->Estado = 'err';
            $this->objQProcessState->Descripcion = $e->getMessage();
            $this->objQProcessState->Save();
            restore_error_handler();
            return false;
        }
        
        if ($blnError || $this->objQProcessState->Error) {
            $msj = "Se encontraron errores en la migración. La base puede haber quedado inconsistente. Se finaliza el proceso.";
            LogHelper::Error($msj);
            $this->objQProcessState->Estado = 'err';
            $this->objQProcessState->Descripcion = $msj;
            $this->objQProcessState->Save();
            restore_error_handler();
            return;
        }
        
        // Borro los planes únicamente si se indica en el Check (#2279)
        if ($blnBorrarPlanes) {
            // Limpio los planes de estudio que no están en la carga
            //
            LogHelper::Log("Borrando los planes de estudio en la Migración");
            $this->CorrerSql("select correccion_migracion_limpiar_planes();", 'Borrando los planes de estudio en la Migración...');
            //$this->CorrerSql('drop table if exists planes;
            //    select id_plan_estudio_local into temp planes from plan_dictado where id_plan_estudio_local is not null;
            //    delete from plan_estudio_local_modalidad2_assn where id_plan_estudio_local not in (select * from planes);
            //    delete from plan_estudio_local_secundaria where id_plan_estudio_local not in (select * from planes);
            //    delete from plan_estudio_local_superior where id_plan_estudio_local not in (select * from planes);
            //    delete from plan_estudio_local where id_plan_estudio_local not in (select * from planes);', 'Limpiando Planes de Estudio...');
        }
        
        // Corrección de secciones múltiples: se ejecuta un SQL que acomoda los datos
        $this->CorrerSql("select correccion_migracion_secciones_multiples();", 'Corrección de secciones múltiples...');
        //$this->CorrerSql(file_get_contents(__MODEL_DIR__.'/migraciones/correcciones_secciones_multiples.sql'), 'Calculando las Secciones Múltiples...');
        // Corrijo sede_administrativa si es la única localización del establecimiento o si finalmente tiene alumnos...
        $this->CorrerSql("select correccion_migracion_sedes();", 'Corrigiendo Sede Administrativa...');
        //$this->CorrerSql('UPDATE localizacion SET sede_administrativa = false WHERE sede_administrativa 
        //    AND (id_localizacion IN (SELECT id_localizacion FROM oferta_local JOIN plan_dictado USING (id_oferta_local) JOIN alumnos USING (id_plan_dictado)) OR 
        //         id_establecimiento IN (select id_establecimiento from localizacion group by 1 having count(1)=1))', 'Corrigiendo Sede Administrativa...');
        // Corrijo datos erróneos de Subvención que puedan haberse articulado (#2331)
        $this->CorrerSql("select correccion_migracion_subvencion();", 'Corrigiendo Subvención según Sector...');
        //$this->CorrerSql('
        //        SELECT id_localizacion INTO TEMP loc_estatales FROM localizacion JOIN establecimiento USING(id_establecimiento) WHERE c_sector=1;
        //        UPDATE oferta_local SET c_subvencion = -1 WHERE id_localizacion IN (SELECT * FROM loc_estatales) AND  c_subvencion != -1;
        //        UPDATE oferta_local SET c_subvencion = -2 WHERE id_localizacion NOT IN (SELECT * FROM loc_estatales) AND c_subvencion = -1;', 'Corrigiendo Subvención según Sector...');

        $this->CorrerSql("select correccion_migracion_caracteristicas();", 'Corrigiendo Tenencia de Computadoras...');
        //$this->CorrerSql('
        //        UPDATE caracteristicas SET c_caracteristica=91 WHERE c_caracteristica=92 AND id_localizacion IN
        //        (SELECT id_localizacion FROM caracteristicas WHERE c_caracteristica IN (121,131,191,193,195,197,199,201,203,205,464,466,468,470,472,211,307));','Corrigiendo Tenencia de Computadoras...');
        $this->CorrerSql("select correccion_migracion_limpiar_plan_dictado();", 'Limpiando plan dictado...');

        $this->objQProcessState->Descripcion = 'Finalizado.';
        $this->objQProcessState->Estado = 'fin';
        $this->objQProcessState->TotalDone = $this->objQProcessState->Total;
        $this->objQProcessState->Migrados = 0;
        foreach ($this->objQProcessState->arrToProc as $objProcess) {
            $this->objQProcessState->Migrados += $objProcess->ProcessState->Migrados;
        }
        $this->objQProcessState->Save();
        LogHelper::Debug("Se migraron " . $this->objQProcessState->Migrados ." cuadros");
        LogHelper::Log(sprintf("Fin proceso de migración a OLTP : %d Localizaciones", $this->objQProcessState->TotalDone));
        $intCobertura = floor((DatosCuadernillo::QueryCount(QQ::Equal(QQN::DatosCuadernillo()->CEstado,1000)) / DatosCuadernillo::CountAll()) * 100);
        $arrInfoMigracion = array(
            'fecha'         => date(DATE_ATOM),
            'version'       => __SISTEMA_VERSION__,
            'confirmados'   => $blnSoloConfirmados,
            'cobertura'     => $intCobertura,
        );
        file_put_contents(__TMP_DIR__.'/ultima_migracion', serialize($arrInfoMigracion));
        restore_error_handler();
    }
    
    protected function CorrerSql($strSql, $strDescripcion = '') {
        $objDatabase = OLTPTitulo::GetDatabase();
        // Corrección de secciones múltiples: se ejecuta un SQL que acomoda los datos
        try {
            if ($strDescripcion) {
                LogHelper::Debug("Migrando: $strDescripcion");
                $this->objQProcessState->Descripcion = $strDescripcion;
                $this->objQProcessState->Save();
            }
            $objDatabase->NonQuery($strSql);
        }
        catch(Exception $e) {
            $msj = sprintf('Se produjo un error corriendo SQL post migración: %s', $e->getMessage());
            LogHelper::Log($msj,'migracion_oltp.log');
            LogHelper::Error("$msj \n {$e->getTraceAsString()}");
            $this->objQProcessState->Error++;
            $this->objQProcessState->Estado = 'err';
            $this->objQProcessState->Descripcion = $e->getMessage();
            $this->objQProcessState->Save();
            restore_error_handler();
            return false;            
        }        
    }
    
    public function __wakeup() {
        $this->objQProcessState = QProcessMigracionOltpState::Get();
    }

}

class QProcessMigracionOltpState extends QProcessStatePersistFile {

    //public $arrLocalizaciones;
    public $arrRuningLocalizaciones;
    public $arrFinishedLocalizaciones;
    public $Estado;
    public $Start;
    public $Error;
    public $Descripcion;
    public $Total;
    public $TotalDone;
    public $arrToProc;
    public $arrProcRunning;
    public $arrFinished;
    public $SoloConfirmados;
    public $BorrarPlanes;
    public $Migrados;
    public $arrErrors = array();

    public static function Get() {
        $objRet = QProcessMigracionOltpState::Load("QProcessMigracionOltpWorker" . __COD_PROV__);
        if (!$objRet) {
            LogHelper::Debug("No se pudo cargar un estado válido para el proceso QProcessValidaciones así que se crea uno nuevo");
            $objRet = new QProcessMigracionOltpState("QProcessMigracionOltpWorker" . __COD_PROV__);
            $objRet->Save();
        }
        return $objRet;
    }

}

QProcessMigracionOltp::$_CANTIDAD_PROCESOS = __ARTICULATION_PROCESS__;

?>
