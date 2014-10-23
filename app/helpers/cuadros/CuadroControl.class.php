<?php

/**
 * Description of CuadroBaseControl
 *
 * @author hernol
 */
abstract class CuadroControl extends QPanel {

    protected static $CuadrosATotalizar = array();
    public $btnReset;
    public $pnlInconsistencias;
    protected $arrCeldaControls = array();
    protected $objCuadroDao;
    protected $objCuadro;
    protected $arrInputControlValorOrig;
    protected $arrCeldasPintadas = array();
    public $blnBorrarMostrado = false;
    public $btnBorrar;
    public $btnBorrarFilas;
    public $btnBorrarDatosCancelar;
    public $btnLlenarConCero;
    public $btnSinInformacion;
    public $btnMigrar;
    public $btnTotalizar;
    public $btnInvisibleDeshabilitaCuadros;
    protected $blnReadOnly;

    public function __construct($objParent, CuadroDAO $objCuadroDao, $strControlId = null, $blnReadOnly = false) {
        try {
            parent::__construct($objParent, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $this->objCuadroDao = $objCuadroDao;
        $this->objCuadro = $objCuadroDao->Cuadro;
        /* foreach ($this->GetFilas() as $objFila) {
          $this->CrearCeldaControls($objFila);
          } */
        $this->blnReadOnly = $blnReadOnly;

        $strPathToViewFile = __VIEW_DIR__ . '/cuadros/Cuadro' . $this->objCuadro->IdDefinicionCuadro . '.tpl.php';
        if (is_file($strPathToViewFile)) {
            //QApplication::DisplayAlert('paso por aca');
            $this->strTemplate = $strPathToViewFile;
        }
        $this->btnReset = new QButton($this);
        $this->btnReset->Text = "Reset Cuadro";
        $this->btnReset->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'CuadroReset'));

        $ctrlid = $this->ControlId;
        $this->btnBorrar = new QButton($this);
        $this->btnBorrar->Text = "Borrar seleccionadas";
        $this->btnBorrar->Display = false;
        $this->btnBorrarDatosCancelar = new QButton($this);
        $this->btnBorrarDatosCancelar->Text = "Cancelar borrar";
        $this->btnBorrarDatosCancelar->Display = false;
        $this->btnBorrarFilas = new QButton($this);
        $this->btnBorrarFilas->Text = "Borrar filas";
//        QApplication::DisplayAlert("filas = " . $this->objCuadro->CountFilas() . " columnas = " . $this->objCuadro->CountColumnas() );
        if ($this->objCuadro instanceof CuadroFijoBase && ($this->objCuadro->CountFilas() < 2 || $this->objCuadro->CountColumnas() < 2 )) {
            $this->btnBorrar->Visible = false;
            $this->btnBorrarDatosCancelar->Visible = false;
            $this->btnBorrarFilas->Visible = false;
        }

        //$strJs = "limitctl = $('#$ctrlid'); $('input:text', limitctl).val(''); $('select', limitctl).val(0); $('input:checkbox', limitctl).attr('checked',false); $('textarea', limitctl).val('');";
        $btncancelid = $this->btnBorrarDatosCancelar->ControlId;
        $btnborrarid = $this->btnBorrar->ControlId;
        $btnborrarfilasid = $this->btnBorrarFilas->ControlId;
        $this->btnBorrarDatosCancelar->AddCssClass("borrarfilascancelar_button");
        $this->btnBorrarDatosCancelar->AddAction(new QClickEvent(), new QJavaScriptAction("$('td.delete_col', $('#$ctrlid')).hide(); $('#${btncancelid}_ctl').hide(); $('#${btnborrarid}_ctl').hide(); $('#${btnborrarfilasid}_ctl').show();"));
        $this->btnBorrarFilas->AddCssClass("borrarfilas_button");
        $this->btnBorrarFilas->AddAction(new QClickEvent(), new QJavaScriptAction("$('td.delete_col', $('#$ctrlid')).show(); $('#${btncancelid}_ctl').show(); $('#${btnborrarid}_ctl').show(); $('#${btnborrarfilasid}_ctl').hide();"));
        $this->btnBorrar->AddCssClass("borrarfilasok_button");
        $this->btnBorrar->AddAction(new QClickEvent(), new QJavaScriptAction("BorrarCuadro('$ctrlid'); $('td.delete_col', $('#$ctrlid')).hide(); $('#${btncancelid}_ctl').hide(); $('#${btnborrarid}_ctl').hide(); $('#${btnborrarfilasid}_ctl').show();"));

        //$this->btnBorrarDatos->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'BorrarDatos'));
        $this->btnLlenarConCero = new QButton($this);
        if (!$this->muestroLlenarCeros())
            $this->btnLlenarConCero->Visible = false;
        $this->btnLlenarConCero->Text = "Llenar con ceros";
        $this->btnLlenarConCero->ToolTip = "Llenar las celdas numéricas con ceros";
        $strJs = "LlenarCuadroCeros('$ctrlid');";
        $this->btnLlenarConCero->AddCssClass("llenarconcero_button");
        $this->btnLlenarConCero->AddAction(new QClickEvent(), new QJavaScriptAction($strJs));
        $this->btnSinInformacion = new QButton($this, "sininfo$ctrlid");
        $this->btnSinInformacion->Text = "Sin Inf / NC";
        $this->btnSinInformacion->ToolTip = "Sin Información / No Corresponde";
        $this->btnSinInformacion->AddCssClass("sininformacion_button");
        $this->btnSinInformacion->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'CuadroSinInformacion'));

        if($this->objCuadro->Obligatorio)
            $this->btnSinInformacion->Visible = false;

        $this->btnInvisibleDeshabilitaCuadros = new QButton($this, "deshabiilta$ctrlid");
        $this->btnInvisibleDeshabilitaCuadros->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDeshabilitarCuadros_Click'));
        $this->btnInvisibleDeshabilitaCuadros->DisplayStyle = "none";

        $this->btnMigrar = new QButton($this);
        $this->btnMigrar->Text = "Migrar Cuadro";
        $this->btnMigrar->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'Migrar'));
        $this->btnMigrar->Visible = (SERVER_INSTANCE == 'dev' && method_exists($this->objCuadro, 'Migrar')) ? true : false;

        $arrUsuInfo = Authentication::GetUsuarioInfo();

        $this->pnlInconsistencias = new InconsistenciaPanel($this);
        $this->pnlInconsistencias->Visible = false;

        #$this->btnReset->AddAction(new QClickEvent(), new QJavaScriptAction(sprintf("CuadroReset('%s', true)", $this->ControlId)));
        // Setup Control-specific CSS and JS files to be loaded
        // Paths are relative to the __CSS_ASSETS__ and __JS_ASSETS__ directories
        // Multiple files can be specified, as well, by separating with a comma
        $this->AddCssFile(__VIRTUAL_DIRECTORY__ . '/css/cuadros.css');
        $this->AddJavascriptFile("_core/jquery/jquery-1.3.2.min.js");
        $this->AddJavascriptFile(__VIRTUAL_DIRECTORY__ . '/js/cuadros.js');

        foreach ($this->GetFilas() as $objFila) {
            foreach ($objFila->GetCeldas() as $objCelda) {
                $this->arrInputControlValorOrig[$this->GetId($objCelda->Fila->IdFila, $objCelda->Columna->IdColumna)] = $objCelda->Valor;
            }
        }
        $this->Validate();
        if ($this->objCuadro->SinInformacion) {
            $this->SetSinInformacion(false);
        }

        if (!$arrUsuInfo || $this->Cuadro->Bloqueado) {
            $strJs = "$('input:text').attr('disabled','disabled'); $('select').attr('disabled','disabled'); $('input:checkbox').attr('disabled','disabled'); $('textarea').attr('disabled','disabled');$('#del_all').removeAttr('disabled');$('#cuadroTextBox').removeAttr('disabled');";
            QApplication::ExecuteJavaScript($strJs);
        }

        if ((in_array(5, $this->objCuadro->GetColumnasIds()) || in_array(105, $this->objCuadro->GetColumnasIds())) && (count($this->objCuadro->GetFilas()) > 1 || $this->objCuadro instanceof CuadroInfinitoBase)) {
            //QApplication::DisplayAlert(print_r(count($this->objCuadro->GetFilas()),true));
            array_push(self::$CuadrosATotalizar, $this->objCuadro->IdDefinicionCuadro);
        }

        $this->btnTotalizar = new QButton($this);
        $this->btnTotalizar->Text = "Totales";
        $this->btnTotalizar->AddCssClass("totalizar_button");
        if (in_array($this->Cuadro->IdDefinicionCuadro, self::$CuadrosATotalizar)) {

            $this->btnTotalizar->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnTotalizar_Click"));
        } else {
            $this->btnTotalizar->Visible = false;
        }
        
    }
    
    public function btnTotalizar_Click() {

        if (in_array(5, $this->objCuadro->GetColumnasIds())) {
            $intTotal = ConsistenciaHelper::SumarAgrupandoMapeado($this->objCuadro, 5);
        }
        if (in_array(7, $this->objCuadro->GetColumnasIds())) {
            $intVarones = ConsistenciaHelper::SumarAgrupandoMapeado($this->objCuadro, 7);
            QApplication::DisplayAlert("Total: " . $intTotal[0] . "\n\nVarones: " . $intVarones[0]);
        }elseif(in_array(5, $this->objCuadro->GetColumnasIds())){
            QApplication::DisplayAlert("Total: " . $intTotal[0]);
        }
        if (in_array(105, $this->objCuadro->GetColumnasIds())) {
            $intTotal = ConsistenciaHelper::SumarAgrupandoMapeado($this->objCuadro, 105);
           
        }
        if (in_array(106, $this->objCuadro->GetColumnasIds())) {
            $intVarones = ConsistenciaHelper::SumarAgrupandoMapeado($this->objCuadro, 106);
            QApplication::DisplayAlert("Total Matrícula: " . $intTotal[0] . "\n\nTotal Varones: " . $intVarones[0]);
        }
    }

    protected function habilitarCuadros() {
        // utilizo contadores para evitar recorrer todos los cuadros de la página
        $j = count($this->objCuadro->arrIdCuadrosQueDeshabilita);
        $i = 0;
        foreach ($this->ParentControl->CuadroControls as $objCuadroControl) {
            if (in_array($objCuadroControl->Cuadro->IdCuadro, $this->objCuadro->arrIdCuadrosQueDeshabilita)) {
                if ($objCuadroControl->Cuadro->SinInformacion) {
                    $objCuadroControl->CuadroSinInformacion();
                }
                if (++$i >= $j)
                    break;
            }
        }
    }

    protected function deshabilitarCuadros() {
        // utilizo contadores para evitar recorrer todos los cuadros de la página
        $this->SaveCuadro();
        $j = count($this->objCuadro->arrIdCuadrosQueDeshabilita);
        $i = 0;
        foreach ($this->ParentControl->CuadroControls as $objCuadroControl) {
            if (in_array($objCuadroControl->Cuadro->IdCuadro, $this->objCuadro->arrIdCuadrosQueDeshabilita)) {
                if (!$objCuadroControl->objCuadro->IsEmpty(true)) {
                    QApplication::ExecuteJavaScript("ResetChkBox('" . $this->ControlId . "')");
                    QApplication::DisplayAlert('No se puede marcar como "Sin información / No Corresponde" porque existen datos en un cuadro dependiente');
                    return false;
                }
                if (++$i >= $j)
                    break;
            }
        }
        $i = 0;
        foreach ($this->ParentControl->CuadroControls as $objCuadroControl) {
            if (in_array($objCuadroControl->Cuadro->IdCuadro, $this->objCuadro->arrIdCuadrosQueDeshabilita)) {
                if (!$objCuadroControl->Cuadro->SinInformacion) {
                    $objCuadroControl->CuadroSinInformacion();
                }
                if (++$i >= $j)
                    break;
            }
        }
        return true;
    }

    public function btnDeshabilitarCuadros_Click() {
        if (empty($this->objCuadro->arrIdCuadrosQueDeshabilita))
            return;

        if (Consistencia4000::EvaluarCuadro($this->objCuadro) == Consistencia4000::NO)
            $this->deshabilitarCuadros();
        else
            $this->habilitarCuadros();


        /*

          $objFila = $this->objCuadro->GetFila(222);
          $objColumna = $this->objCuadro->GetColumna(50);
          if (!$objFila || !$objColumna) {
          LogHelper::Error('El cuadro quiere deshabilitar pero no es SI/NO');
          return;
          }
          if($objFila->GetCelda($objColumna)->Valor == "on"){
          $this->deshabilitarCuadros();
          }
          else{
          $this->habilitarCuadros();
          } */
    }

    private function muestroLlenarCeros() {
        foreach ($this->objCuadro->GetColumnas() as $objCol) {
            if ($objCol->TipoDato == TipoDatoType::INTEGER || $objCol->TipoDato == TipoDatoType::SMALLINT)
                return true;
        }
        return false;
    }

    public static function GetControl(CargaIndexPanel $objCargaIndexPanel, $intIdDefinicionCuadro, $objLocalizacion, $blnReadOnly = false) {
        $objCuadroDao = new CuadroDAO();
        $objCuadroDao->LoadCuadro($intIdDefinicionCuadro, $objLocalizacion);

        if ($objCuadroDao->Cuadro instanceof CuadroInfinitoBase) {
            return new CuadroInfinitoControl($objCargaIndexPanel, $objCuadroDao, null, $blnReadOnly);
        } elseif ($objCuadroDao->Cuadro instanceof CuadroFijoBase) {
            return new CuadroFijoControl($objCargaIndexPanel, $objCuadroDao, null, $blnReadOnly);
        } else {
            throw new QCallerException("ERROR: Objeto cuadro no corresponde a ningún tipo");
        }
    }

    public function Migrar() {
        if (method_exists($this->objCuadro, 'Migrar')) {
            try {
                $this->objCuadro->Migrar();
            } catch (Exception $e) {
                QApplication::DisplayAlert($e->getMessage());
            }
        }
    }

    public function CuadroSinInformacion() {
        if ($this->objCuadro->SinInformacion) {
            if (count($this->objCuadro->arrIdCuadrosQueDeshabilita)) {
                $this->habilitarCuadros();
            }
            $this->SetConInformacion();
        } else {
            if (!$this->objCuadro->IsEmpty(true)) {
                QApplication::DisplayAlert('No se puede marcar como "Sin información / No Corresponde" un cuadro con datos');
                return;
            }
            if (count($this->objCuadro->arrIdCuadrosQueDeshabilita)) {
                if (!$this->deshabilitarCuadros())
                    return;
            }
            $this->SetSinInformacion();
        }
    }

    public function SetSinInformacion($blnSave = true) {
        if (!$this->objCuadro->IsEmpty()) {
            QApplication::DisplayAlert('No se puede marcar como "Sin información / No Corresponde" un cuadro con datos');
            return;
        }
        $this->objCuadro->SinInformacion = true;
        $this->Validate();
        if($blnSave)$this->SaveCuadro();
        if ($this->objCuadro->HasError) {
            $this->objCuadro->SinInformacion = false;
            QApplication::DisplayAlert('No se puede marcar como "Sin información / No Corresponde" el cuadro porque tiene un error de Información Faltante');
            return;
        }

        $this->ConfigSinInformacion();
    }

    public function SetConInformacion() {
        $this->ConfigConInformacion();
        $this->Validate();
        $this->SaveCuadro();
    }

    protected function ConfigSinInformacion() {
        $ctrlid = $this->ControlId;
        QApplication::ExecuteJavaScript("RenderSinInformacion('$ctrlid');");
        $this->objCuadro->SinInformacion = true;
        $this->btnSinInformacion->RemoveCssClass("sininformacion_button");
        $this->btnSinInformacion->AddCssClass("coninformacion_button");
        $this->btnLlenarConCero->Display = false;
        $this->btnBorrarFilas->Display = false;
    }
    
    protected function ConfigConInformacion() {
        $this->MarkAsModified();
        $this->objCuadro->SinInformacion = false;
        $this->btnSinInformacion->RemoveCssClass("coninformacion_button");
        $this->btnSinInformacion->AddCssClass("sininformacion_button");
        QApplication::ExecuteJavaScript("SetUpKeyNavigation();");
        $this->btnLlenarConCero->Display = true;
        $this->btnBorrarFilas->Display = true;
    }
    
    public function Render($blnDisplayOutput = true) {
        return parent::Render($blnDisplayOutput);
    }

    public function SetupInconsistenciaPanel() {
        $objInconsistenciaArray = array();
        foreach ($this->GetFilas() as $objFila) {
            foreach ($objFila->GetCeldas() as $objCelda) {
                foreach ($objCelda->getInconsistencias() as $objInconsistencia) {
                    $this->pnlInconsistencias->AddInconsistencia($objInconsistencia);
                }
            }
        }
        foreach ($this->Cuadro->GetInconsistenciaHijosArray() as $objInconsistenciaHijo) {
            $this->pnlInconsistencias->AddInconsistenciaHijo($objInconsistenciaHijo);
        }
    }

    public function __toString() {
        if($this->objCuadroDao->DatosCuadro->Conflicto==true){
            return sprintf("%s <br><u style='color: red' title='Este cuadro no corresponde a la Oferta Educativa de la Localización (Cuadro en Conflicto)'>ATENCIÓN! Este cuadro debería estar vacío</u>", $this->objCuadroDao->Cuadro);        
        }
        return sprintf("%s", $this->objCuadroDao->Cuadro);        
    }

    public function GetColumnas() {
        return $this->objCuadroDao->Cuadro->GetColumnas();
    }

    public function GetColumna($intIndex) {
        if (array_key_exists($intIndex, $this->arrColumnas))
            return $this->objCuadroDao->Cuadro->GetColumna($intIndex);
        else
            throw new QCallerException(sprintf('ERROR: La columna de indice %d no existe', $intIndex));
    }

    public function GetFilas() {
        return $this->Cuadro->GetFilas();
    }

    public function GetFila($intIndex) {
        return $this->Cuadro->GetFila($intIndex);
    }

    public function __get($strName) {
        switch ($strName) {
            case 'Columnas':
                return $this->objCuadroDao->GetColumnas();
            case 'Filas':
                return $this->objCuadroDao->GetFilas();
            case 'Cuadro':
                return $this->objCuadroDao->Cuadro;
            case 'NombreCorto':
                return strtok($this->objCuadroDao->Cuadro, " ");

            default:
                return parent::__get($strName);
        }
    }

    public function Validate() {
        $this->ResetCeldas();
        $this->pnlInconsistencias->Reset();
        $this->Cuadro->Validate();
        try {
            $this->objCuadroDao->ActualizarEstado();
        } catch (CuadernilloDesconfirmadoException $e) {
            QApplication::DisplayAlert("Se detectó un error en un Cuadro de un Cuadernillo Confirmado, y para evitar incoherencias en los datos se lo Desconfirmó");
        }

        QApplication::ExecuteJavaScript('PageModified = false;');
        if ($this->Cuadro->SinInformacion) {
            $this->ConfigSinInformacion();
        }
        else {
            $this->ConfigConInformacion();
        }
        if ($this->Cuadro->HasError || $this->Cuadro->HasInconsistencia || count($this->Cuadro->GetInconsistenciaHijosArray()) != 0) {
            //$this->MarkAsModified();
            $this->MarcarInconsistencias();
            $this->SetupInconsistenciaPanel();
            return false;
        }
        return true;
    }

    public function SaveCuadro($blnOnlyDatosCuadro = false) {
        //$this->Validate();
        $this->objCuadroDao->SaveCuadro($blnOnlyDatosCuadro);
    }

    private function MarcarInconsistencias() {
        foreach ($this->GetFilas() as $objFila) {
            foreach ($objFila->GetCeldas() as $objCelda) {
                if ($objCelda->HasError && count($objCelda->getInconsistencias()) == 0)
                    $this->PintarCelda($objCelda); // cuando la inconsistencia es de otra celda y esta está implicada
                elseif ($objCelda->HasInconsistencia && count($objCelda->getInconsistencias()) == 0)
                    $this->PintarCelda($objCelda, new InconsistenciaAdvertencia("",0)); // cuando la inconsistencia es de otra celda y esta está implicada y no tiene error
                else
                    foreach ($objCelda->getInconsistencias() as $objInconsistencia) {
                        if ($objInconsistencia->isDeFila)
                            $this->PintarFila($objCelda, $objInconsistencia);
                        else
                            $this->PintarCelda($objCelda, $objInconsistencia);
                    }
            }
        }
    }

    private function PintarFila(Celda $objCelda, $objInconsistencia) {
        $objFila = $objCelda->Fila;
        foreach ($objFila->GetCeldas() as $objUnaCelda) {
            $this->PintarCelda($objUnaCelda, $objInconsistencia);
        }
    }

    private function PintarCelda(Celda $objCelda, $objInconsistencia=null) {
        $this->arrCeldasPintadas[] = $objCelda;
        $strErrorClass = 'InputError';
        if ($objInconsistencia) {
            switch (true) {
                case $objInconsistencia instanceof InconsistenciaError:
                case $objInconsistencia instanceof InconsistenciaFaltante:
                    $strErrorClass = 'InputError';
                    break;
                case $objInconsistencia instanceof InconsistenciaAdvertencia:
                    $strErrorClass = 'InputWarning';
                    break;
                default:
                    $strErrorClass = 'InputError';
                    break;
            }
            $strMsj = htmlspecialchars("Error " . $objInconsistencia->Codigo . " - " . $objInconsistencia->Descripcion, ENT_COMPAT);
            $strJavaScript = sprintf("pintarCeldaCon('%s', '%s',\"%s\")", $this->GetId($objCelda->Fila->IdFila, $objCelda->Columna->IdColumna), $strErrorClass, $strMsj);
        }
        else
            $strJavaScript = sprintf("pintarCeldaCon('%s','%s','')", $this->GetId($objCelda->Fila->IdFila, $objCelda->Columna->IdColumna), $strErrorClass);

        QApplication::ExecuteJavaScript($strJavaScript);
    }

    private function ResetCeldas() {
        foreach ($this->arrCeldasPintadas as $objCelda) {
            $this->ResetCelda($objCelda);
        }
        $this->Cuadro->HasError = false;
        $this->Cuadro->HasInconsistencia = false;

        $this->arrCeldasPintadas = array();
    }

    private function ResetCelda(Celda $objCelda) {
        $objCelda->ResetErrores();
        $strJavaScript = sprintf("ResetColorCelda('%s')", $this->GetId($objCelda->Fila->IdFila, $objCelda->Columna->IdColumna));
        QApplication::ExecuteJavaScript($strJavaScript);
    }

    /**
     * If this control needs to update itself from the $_POST data, the logic to do so
     * will be performed in this method.
     */
    public function ParsePostData() {
        $this->objCuadro->ResetEndScript();
        foreach ($this->objCuadro->GetFilas() as $objFila) {
            foreach ($objFila->GetCeldas() as $objCelda) {
                $strId = $this->GetId($objFila->IdFila, $objCelda->Columna->IdColumna);
                //if ($objCelda->Columna->TipoDato == TipoDatoType::RADIO) {
                //    if (isset($_POST[$strId . '_0'])) {
                //        $objCelda->Valor = '';
                //    } elseif (isset($_POST[$strId . '_1'])) {
                //        $mixValor = $_POST[$strId . '_1'];
                //        unset($_POST[$strId . '_1']);
                //        if ($objCelda->Valor != $mixValor) {
                //            $objCelda->Valor = $mixValor;
                //        }
                //    }
                //}
                if (isset($_POST[$strId])) {
                    $mixValor = $_POST[$strId];
                    unset($_POST[$strId]);
                    if ($objCelda->Valor !== $mixValor) {
                        $objCelda->Valor = $mixValor;
                    }
                } else {
                    //para el caso de los checkbox que si se desclickea no viene en el post y hay que borrarlo.
                    if ($objCelda->Valor != '') {
                        $objCelda->Valor = '';
                    }
                }
            }
        }
    }

    public function GetInputHtml(Celda $objCelda) {
        $strId = $this->GetId($objCelda->Fila->IdFila, $objCelda->Columna->IdColumna);
        $strInput = InputFactory::GetHtml($strId, $objCelda->Columna, $objCelda->Valor, '', $objCelda->Disabled);
        return $strInput;
    }

    public function GetId($idFila, $idColumna) {
        return sprintf("inp_%d_%d_%d", $this->objCuadro->IdCuadro, $idFila, $idColumna);
    }

    public function GetEndScript() {
        if (!$this->blnVisible | !$this->blnEnabled) {
            return '';
        }
        $strJavaScript = $this->objCuadro->GetEndScript();
        //$strJavaScript .="\n";
        // si el cuadro es un cuadro que deshabilita otros cuadros registro el evento click
        if (count($this->objCuadro->arrIdCuadrosQueDeshabilita))
            $strJavaScript .= "ActivarBotonDeshabilitar(" . $this->Cuadro->IdCuadro . ");";
//        $strJavaScript .= "arrCuadrosEnPagina[arrCuadrosEnPagina.length] = '" . $this->NombreCorto . "';";
        if($this->objCuadroDao->DatosCuadro->Conflicto==true)
            $strJavaScript .= "SetConflictoCuadro('".$this->ControlId."');";
        if ($this->Cuadro->Bloqueado) {
            $strJavaScript .= "$('input:text').attr('disabled','disabled'); $('select').attr('disabled','disabled'); $('input:checkbox').attr('disabled','disabled'); $('textarea').attr('disabled','disabled');$('#del_all').removeAttr('disabled');$('#cuadroTextBox').removeAttr('disabled');";
            // QApplication::ExecuteJavaScript($strJs);
        }

        return "$().ready(function() {" . $strJavaScript . "; });";
    }

}

?>
