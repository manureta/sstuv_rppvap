<?php
set_time_limit(0);
// Include prepend.inc to load Qcubed
$_SERVER['REQUEST_URI'] = '/articulacionpadroncli';
$_SERVER['SERVER_SOFTWARE'] = 'Command Line';
$_SERVER['REQUEST_URI'] = '/articulacionpadroncli';
set_time_limit(0);
$GLOBALS['__DISABLE_CACHE__'] = true;
ini_set('memory_limit', '6048M');
require(dirname(__FILE__).'/../prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
// require('prepend.inc.php');				/* if you DO have "includes/" in your include_path */    

// Security check for ALLOW_REMOTE_ADMIN
// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
//QApplication::CheckRemoteAdmin();
QApplication::$ProcessOutput = false;
ob_end_flush();
//ob_start();
class ArticulacionpadronCli {
    protected $processArticularLocalizaciones;
    public $arrLocalizaciones = array();

    public function DisplayMonospacedText($strText) {
        $strText = QApplication::HtmlEntities($strText);
        $strText = str_replace('	', '    ', $strText);
        $strText = str_replace(' ', '&nbsp;', $strText);
        $strText = str_replace("\r", '', $strText);
        $strText = str_replace("\n", '<br/>', $strText);

        _p($strText, false);
    }

    public function finish($str, $exitstatus = false) {
        echo date('[Y-m-d H:i:s]').' '.$str.PHP_EOL;
        if ($exitstatus) {
            exit( 255 );
        } else {
            exit;
        }
    }

    public function show_status($done, $total, $size=30) {

        static $start_time;

        // if we go over our bound, just ignore it
        if($done > $total) return;

        if(empty($start_time)) $start_time=time();
        $now = time();

        $perc=(double)($done/$total);

        $bar=floor($perc*$size);

        $status_bar="\r[";
        $status_bar.=str_repeat("=", $bar);
        if($bar<$size){
            $status_bar.=">";
            $status_bar.=str_repeat(" ", $size-$bar);
        } else {
            $status_bar.="=";
        }

        $disp=number_format($perc*100, 0);

        $status_bar.="] $disp%  $done/$total";

        $rate = ($now-$start_time)/$done;
        $left = $total - $done;
        $eta = round($rate * $left, 2);

        $elapsed = $now - $start_time;

        $status_bar.= " remaining: ".number_format($eta)." sec.  elapsed: ".number_format($elapsed)." sec.";

        echo "$status_bar  ";

        flush();

        // when done, send a newline
        if($done == $total) {
            echo PHP_EOL;
        }

    }


    public function UpdateProgress() {
        try {
            $this->processArticularLocalizaciones->UpdateState();
        } catch (QProcessException $e) {
            error_log('QProcessException:: '.$e->getMessage());
            if ($e->getCode()!=1) {
                error_log('QProcessException (Code 1):: '.$e->getMessage());
                throw $e;
            } else {
                error_log('QProcessException (Code <> 1):: '.$e->getMessage());
                return;
            }
        }
        // si pasaron 120 seg desde la últ actualización seteo error
        if (time() - $this->processArticularLocalizaciones->ProcessState->lastupdate > 300) {
            $this->processArticularLocalizaciones->ProcessState->Estado = 'err';
            $this->processArticularLocalizaciones->ProcessState->arrErrors[] = "Se terminó el tiempo de espera para determinar el estado de la migración.".PHP_EOL."Es probable que el proceso haya finalizado de forma imprevista.";
        }
        $objProcessState = $this->processArticularLocalizaciones->ProcessState;
        switch ($objProcessState->Estado) {
            case 'run':
                if ($objProcessState->TotalDone > 0) {
                    $this->show_status($objProcessState->TotalDone, $objProcessState->Total);
                }
                return true;
            case 'fin':
                $msj = sprintf('Articulación finalizada correctamente. Se actualizaron %d localizaciones%s', $objProcessState->Total, ((count($this->arrLocalizaciones)) ? ' y se omitieron '.count($this->arrLocalizaciones) : ''));

                $this->show_status($objProcessState->TotalDone, $objProcessState->Total);
                break;
            case 'err':
                if (count($objProcessState->arrErrors)>0){
                    $strErrores = implode(PHP_EOL, $objProcessState->arrErrors);
                    $msj = "Se produjeron errores en la articulación: ".PHP_EOL."$strErrores";
                } else {
                    $msj = 'Se produjo un error no esperado en la articulación. La articulación no finalizó correctamente.';
                }
                break;
            default:
                $msj = '';
                if (count($objProcessState->arrErrors)>0) {
                    $strErrores = implode(PHP_EOL, $objProcessState->arrErrors);
                    $msj = "Se produjeron errores en la articulación: ".PHP_EOL."$strErrores";
                    $this->processArticularLocalizaciones->ProcessState->Estado = 'err';
                }
        }
        $this->finish($msj);
        return false;

    }

    public function Articular() {
        echo "Iniciando la Articulación...".PHP_EOL;
        try {
            $this->processArticularLocalizaciones = $objProc = new QProcessArticularLocalizaciones();

            $objProc->ProcessState->Estado = '';
            $objProc->ProcessState->arrErrors = array();
            $objProc->ProcessState->Save();

            $objWSClient = new PadronDinieceWebServiceClient();
            $intCount = $objWSClient->CountLocalizacionesModificadas();
            if(!$intCount) {
                $this->finish(sprintf('No hay cambios en el Padrón desde la última articulación (%s)', QApplication::getUltimaArticulacion()));
            }
            echo "\rSe encontraron $intCount Localizaciones a Articular";
            $step = 0;
            for ($offset = 0; $offset < $intCount; $offset += $step) {
                echo "\rTrayendo ".$offset."/$intCount Localizaciones desde PadronNacional  ";
                flush();
                $arrLocalizacionesAux = $objWSClient->TraerLocalizacionesModificadas($offset);
                if ($step === 0) { //seteo el step de acuerdo al limit de padrón
                    $step = count($arrLocalizacionesAux);
                }

                if (!count($arrLocalizacionesAux)) { 
                    LogHelper::Debug('Se terminaron de identificar las Localizaciones a Articular: '. $intCount);
                    break;
                }
                foreach($arrLocalizacionesAux as $objLocalizacion ) {
                    $arrLocalizaciones []= $objLocalizacion->IdLocalizacion;
                }
                
            }
            echo PHP_EOL;

            echo "Articulando ".count($arrLocalizaciones)." desde PadronNacional".PHP_EOL;
            flush();

            $objProc->SetLocalizaciones($arrLocalizaciones);
            $objProc->Run();
            $wait = 2;
            LogHelper::Debug("Esperando $wait segundos para empezar a pollear");
            sleep($wait);//doy un tiempo de espera para que levante el proceso
            while ($objProc->ProcessState->Estado != 'err') {
                $this->UpdateProgress();
                sleep(1);
            }
        } catch (Exception $e) {
            LogHelper::Debug("Error articulando localizacion cli: ".$e->getMessage());
            $this->finish($e->getMessage(), true);
        }
    }
}

$objArticuacion = new ArticulacionpadronCli();
$objArticuacion->Articular();

