<?php

class PaginaControlPanel extends QPanel {

    public $btnSiguiente;
    public $btnAnterior;
    public $btnReset;
    public $btnSinInformacion;
    public $btnGuardar;
    public $btnClonar;

    public $intIdPagina;
    public $intIdPersonalEstablecimiento;
    public $pnlBloquesClonaosArray = array();
    protected $intIndexBloquesClonaos = 0;
    public $arrIdBloquesPorTitulacion = array();
    public $arrIdBloquesSecuenciales = array (6,7,8);
    protected $mixIdBloqueArray = array();
    protected $objPersonalEstablecimientoUnidadServicioArray = array();

    public $objPersonalEstablecimiento;
    public $objParent;
    public $blnBloqueInfinito = false;
    protected $objCollapsablePanel;
    protected $strTitulo;

    protected $intConsistenciasArray = array();
    protected $blnHasError = false;

    public function __construct($objParent, $intIdPagina, $strControlId = null, $blnReadOnly = false) {
        try {
            parent::__construct($objParent, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        $arrInfoUsuario = Session::GetUsuario();
        $this->objPersonalEstablecimientoUnidadServicioArray = PersonalEstablecimientoUnidadServicio::LoadArrayByIdPersonalNotEmpty($arrInfoUsuario['IdPersonal']);

        $blnEstaDeLicenciaEnTodosLosCargos = PersonalEstablecimientoUnidadServicio::EstaDeLicenciaEnTodoLosCargos($arrInfoUsuario['IdPersonal']);

        $this->AddCssFile(__VIRTUAL_DIRECTORY__.'/assets/css/bloques.css');
        $this->AddJavaScriptFile(__VIRTUAL_DIRECTORY__.'/assets/js/consistencias.js');
        $this->objCollapsablePanel = new QCollapsablePanel($this);

        $this->objParent = $objParent;
        $this->intIdPagina = $intIdPagina;
        $this->blnAutoRenderChildren = true;
        if ($blnEstaDeLicenciaEnTodosLosCargos) {
            $lblNoCargaCedula = new QLabel($this->objCollapsablePanel);
            $lblNoCargaCedula->Text = 'Usted se encuentra de Licencia en todos los cargos declarados, por lo cual no se encuentra en condiciones de cargar el Censo';
            return;
        }

        $this->GenerarBloquesPorNivel();
        if ($this->strTitulo) {
            $this->objCollapsablePanel->Titulo = $this->strTitulo;
        } elseif ($this->pnlBloquesClonaosArray[0]->Titulo) {
            $this->objCollapsablePanel->Titulo = $this->pnlBloquesClonaosArray[0]->Titulo;
        }
        $this->CreateButtons();
        $this->Consistir();
        QApplication::ExecuteJavascript('cc.correr_consistencias();');
    }

    public function LimpiarInconsistencias() {
        foreach ($this->pnlBloquesClonaosArray as $pnlBloque) {
            $pnlBloque->LimpiarInconsistencias();
        }
    }

    public function Consistir($blnEjecutarJs = false) {
        $this->blnHasError = false;
        $this->LimpiarInconsistencias();
        foreach ($this->pnlBloquesClonaosArray as $pnlBloque) {
            $pnlBloque->Consistir($blnEjecutarJs);
            if ($pnlBloque->HasError) {
                $this->blnHasError = $pnlBloque->HasError;
            }
        }
    }

    protected function GenerarBloquesPorNivel() {
        /**
         * E*a*s*t*e*r e*g*g 1!!
         * http://grooveshark.com/#!/s/Son+Todos+Clonaos/2nG20C
         * https://www.google.com.ar/url?sa=t&rct=j&q=&esrc=s&source=web&cd=4&cad=rja&uact=8&ved=0CDkQFjAD&url=http%3A%2F%2Fwww.last.fm%2Fmusic%2FAsado%2BViolento%2F_%2FSon%2BTodos%2BClonaos&ei=Pn7iU8qQH_bJsQSQh4KQBA&usg=AFQjCNEUpoQT1XvGEagrA9HiYSBP3vVl7A&sig2=2LZQYXs_mj1u_8MNFWwnzw&bvm=bv.72197243,d.cWc
         * https://www.google.com.ar/url?sa=t&rct=j&q=&esrc=s&source=web&cd=5&cad=rja&uact=8&ved=0CEAQFjAE&url=https%3A%2F%2Fopen.spotify.com%2Ftrack%2F73oEUsHALhYmh52RN3Xt1R&ei=Pn7iU8qQH_bJsQSQh4KQBA&usg=AFQjCNFPbDv_w3WM4xWpqwzvEP-mq1IaLQ&sig2=8Jcr8-cPa_Ws0ixyqX6Xxw&bvm=bv.72197243,d.cWc
         */

        if (!count($this->mixIdBloqueArray)) {
            $this->mixIdBloqueArray = array( $this->intIdPagina );
        }

        foreach ($this->mixIdBloqueArray as $mixIdBloque) {
            if (in_array($mixIdBloque, $this->arrIdBloquesPorTitulacion)) {
                foreach ($this->objPersonalEstablecimientoUnidadServicioArray as $objPersonalEstablecimientoUnidadServicio) {
                    $objCollapsableItem = self::GetBloquePanel($this->objCollapsablePanel, $mixIdBloque, $intIdPagina,$objPersonalEstablecimientoUnidadServicio->IdPersonalEstablecimientoUnidadServicio);
                    $objCollapsableItem->Titulo = $objPersonalEstablecimientoUnidadServicio->IdUnidadServicioObject->IdLocalizacionObject->IdEstablecimientoObject. ' - '.$objPersonalEstablecimientoUnidadServicio->IdUnidadServicioObject;
                    $this->pnlBloquesClonaosArray[$this->intIndexBloquesClonaos] = $objCollapsableItem->Content;
                    $this->intIndexBloquesClonaos++;
                }
            }if(in_array($mixIdBloque,$this->arrIdBloquesSecuenciales)){
                //el bloque 8 es secuencial pero no tiene Intro, arranca directo con secuencia 1
                if($mixIdBloque == 8){
                    $objCollapsableItem = self::GetBloquePanel($this->objCollapsablePanel, $mixIdBloque, $this->intIdPagina,1);
                    $intSecuencia = $this->intIndexBloquesClonaos + 1;
                    $objCollapsableItem->Titulo = "Cursos de capacitacion /otras actividades de desarrollo profesional N°".$intSecuencia;
                    $objCollapsableItem->Collapsed = false;
                    $objCollapsableItem->CollapsableLink = false;
                }
                else
                    $objCollapsableItem = self::GetBloqueIntroPanel($this->objCollapsablePanel, $mixIdBloque, $this->intIdPagina);
                $this->pnlBloquesClonaosArray[$this->intIndexBloquesClonaos] = $objCollapsableItem->Content;
                $this->intIndexBloquesClonaos++;
            }else {
                $objCollapsableItem = self::GetBloquePanel($this->objCollapsablePanel, $mixIdBloque, $this->intIdPagina);
                $objCollapsableItem->Collapsed = false;
                $objCollapsableItem->CollapsableLink = false;
                $this->pnlBloquesClonaosArray[$this->intIndexBloquesClonaos] = $objCollapsableItem->Content;
                $this->intIndexBloquesClonaos++;
            }
        }
     }

    public function ParsePostData() {
        foreach ($this->pnlBloquesClonaosArray as $objBloqueClonao) {
            $objBloqueClonao->ParsePostData();
        }
    }

    public function SaveAndShow() {
        $this->Save();
        $this->Refresh();
        // Save
    }

    public function Save() {
        $this->ParsePostData();
        $this->Consistir(true);
        foreach ($this->pnlBloquesClonaosArray as $objBloqueClonao) {
            $objBloqueClonao->Save();
        }
        // Save
    }

    public function CreateButtons($blnBtnAnterior=true,$blnBtnGuardar=true,$blnBtnClonar=true,$blnBtnSiguiente=true) {
        if($blnBtnSiguiente){
            $this->btnSiguiente = new QButton($this->objCollapsablePanel);
            $this->btnSiguiente->Name = 'Siguiente';
            $this->btnSiguiente->Text = 'Siguiente';
            $this->btnSiguiente->AddCssClass('btn-primary');
            $this->btnSiguiente->Icon = 'arrow-right';
            $this->btnSiguiente->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'SiguientePagina'));
        }
        if($blnBtnGuardar){
            $this->btnGuardar = new QButton($this->objCollapsablePanel);
            $this->btnGuardar->Name = 'Guardar';
            $this->btnGuardar->Text = 'Guardar';
            $this->btnGuardar->AddCssClass('btn-success');
            $this->btnGuardar->Icon = 'save';
            $this->btnGuardar->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'SaveAndShow'));
        }

        if($blnBtnClonar){
            $this->btnClonar = new QButton($this->objCollapsablePanel);
            $this->btnClonar->Name = 'Clonar';
            $this->btnClonar->Text = 'Clonar';
            $this->btnClonar->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'GenerarBloquesPorNivel'));
            $this->btnClonar->Visible = ($this->blnBloqueInfinito && SERVER_INSTANCE == 'dev');
        }
        if($blnBtnAnterior){
            $this->btnAnterior = new QButton($this->objCollapsablePanel);
            $this->btnAnterior->Name = 'Anterior';
            $this->btnAnterior->Text = 'Anterior';
            $this->btnAnterior->Icon = 'undo';
            $this->btnAnterior->AddCssClass('btn-default');
            $this->btnAnterior->Visible = ($this->intIdPagina > 1);
            $this->btnAnterior->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'AnteriorPagina'));
        }

    }

    public function RenderButtons($blnOutput = true) {
        $strToReturn = '<div class="cedula_buttons">'.$this->btnAnterior->Render(false)
                .'&nbsp;'.$this->btnSiguiente->Render(false)
                .'&nbsp;'.$this->btnClonar->Render(false)
                .'&nbsp;'.$this->btnGuardar->Render(false).'</div>';
        if (!$blnOutput) {
            return $strToReturn;
        } else {
            echo $strToReturn;
        }

    }

    public function RenderHiddenElements($blnOutput = true) {
        $strToReturn .= sprintf('<input type="hidden" name="id_pagina" id="id_pagina" value="%d" />', $this->intIdPagina, $this->intIdPagina);
        foreach ($this->mixIdBloqueArray as $mixIdBloque) {
            $strToReturn .= sprintf('<input type="hidden" name="id_bloque[]" id="id_bloque_%d" value="%d" />', $mixIdBloque, $mixIdBloque);
        }
        if (!$blnOutput) {
            return $strToReturn;
        } else {
            print($strToReturn);
        }
    }

    public function SiguientePagina($strFormId, $strControlId, $strParameter) {
        $this->Save();
        if ($this->blnHasError) {
            QApplication::ExecuteJavascript('if (window.confirm("La página posee errores, está seguro que desea continuar?")) { window.location="'.__VIRTUAL_DIRECTORY__.'/pagina/'.(1+$this->intIdPagina).'"; }');
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/pagina/'.(1+$this->intIdPagina));
        }
    }

    public function AnteriorPagina($strFormId, $strControlId, $strParameter) {
        $this->Save();
        QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/pagina/'.($this->intIdPagina-1));
    }

    public function __get($strName) {
        foreach ($this->pnlBloquesClonaosArray as $mixIdBloque => $objBloque) {
            if ($strName == get_class($objBloque)) {
//            if (array_key_exists($strName, $this->pnlBloquesClonaosArray)) {
                return $this->pnlBloquesClonaosArray[$mixIdBloque];
            }
        }
        switch ($strName) {
            default:
                return parent::__get($strName);
            break;
        }
    }

    public static function GetBloquePanel($objParent, $mixIdBloque, $intIdPagina, $intUniqueId = null) {
        if (!class_exists($strClass = self::getNombreBloqueClass($mixIdBloque))) {
            throw new Exception('No existe el Bloque '.$mixIdBloque);
        }
        $objCollapsableItem = new QCollapsableItemPanel($objParent);
        $objCollapsableItem->Content = new $strClass($objCollapsableItem, $mixIdBloque, $intIdPagina, $intUniqueId);
        return $objCollapsableItem;
    }

    public static function GetNombreBloqueClass($mixIdBloque) {
        return 'Bloque'.$mixIdBloque.'Panel';
    }
    public static function GetBloqueIntroPanel($objParent, $mixIdBloque, $intIdPagina, $intUniqueId = null) {
        if (!class_exists($strClass = self::getNombreBloqueIntroClass($mixIdBloque))) {
            throw new Exception('No existe el Bloque '.$mixIdBloque);
        }
        $objCollapsableItem = new QCollapsableItemPanel($objParent);
        $objCollapsableItem->Content = new $strClass($objCollapsableItem, $mixIdBloque, $intIdPagina, $intUniqueId);
        return $objCollapsableItem;
    }

    public static function GetNombreBloqueIntroClass($mixIdBloque) {
        return 'Bloque'.$mixIdBloque.'IntroPanel';
    }

}
