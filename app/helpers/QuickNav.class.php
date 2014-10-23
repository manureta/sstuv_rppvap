<?php
class QuickNav extends QPanel {
    public $objLocalizacionTextBox;
    public $objCuadernilloListBox;
    public $objPaginaIntegerTextBox;
    public $objCuadroNumberTextBox;
    public $btnIr;
  
        public function __construct($objParentObject, $strControlId = null) {
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset(); throw $objExc;
            }
            $this->strTemplate = __VIEW_DIR__.'/QuickNav.tpl.php';
            $this->objLocalizacionTextBox = new QTextBox($this);
            $this->objLocalizacionTextBox->Columns=10;
            $this->objLocalizacionTextBox->MaxLength=10;
            $this->objLocalizacionTextBox->Visible = false;
            $objLocalizacion = Session::getLocalizacion();
            if($objLocalizacion)
                $this->objLocalizacionTextBox->Text = $objLocalizacion->Cueanexo;
            $this->objPaginaIntegerTextBox = new QNumberTextBox($this); // TODO: podria/deberia ser un Integer con maximum y minimum
            $this->objPaginaIntegerTextBox->Columns=3;
            $this->objPaginaIntegerTextBox->SetCustomStyle("height", "14px");
            $this->objPaginaIntegerTextBox->SetCustomStyle("margin-top", "-2px");
            $this->objPaginaIntegerTextBox->SetCustomStyle("float", "right");
            $this->objPaginaIntegerTextBox->Display = false;
            $this->objCuadroNumberTextBox = new QTextBox($this,"cuadroTextBox");
            $this->objCuadroNumberTextBox->Columns=5;
            $this->objCuadroNumberTextBox->SetCustomStyle("height", "14px");
            $this->objCuadroNumberTextBox->SetCustomStyle("margin-top", "-2px");
            $this->objCuadroNumberTextBox->SetCustomStyle("float", "right");
            $this->objCuadroNumberTextBox->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this, 'btnIrClick'));
            $this->btnIr = new QImageButton($this);
            $this->btnIr->ImageUrl = __VIRTUAL_DIRECTORY__."/images/bot_header_corto.png";
            $this->btnIr->SetCustomStyle("cursor","pointer");
            //$this->btnIr->CausesValidation = true;
            $this->btnIr->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnIrClick'));
            $objDefinicionPagina = DefinicionPagina::Load(QType::Cast(QApplication::QueryString('pagina'), QType::Integer));                                       // necesario porque no se use
            if($objDefinicionPagina) {
                $this->btnIr->ActionParameter = $objDefinicionPagina->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto; // el listbox de cuadernillo
                $this->objCuadroNumberTextBox->ActionParameter = $objDefinicionPagina->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto;

            }
            $this->objCuadernilloListBox = new QListBox($this);
            $this->objCuadernilloListBox->AddItem("Elija", null, true);
            foreach(DefinicionCuadernillo::LoadAll() as $objDefinicionCuadernillo) {
                $this->objCuadernilloListBox->AddItem($objDefinicionCuadernillo->Nombre, $objDefinicionCuadernillo->NombreCorto);
            }
            $this->objCuadernilloListBox->Visible=false;
        }

        public function btnIrClick($strFormId, $strControlId, $strParameter) {
            $blnDidSomething = false;
            $objLocalizacion = Session::getLocalizacion();
            $strCuadernillo = $strParameter; // necesario porque no se use el listbox de cuadernillo
            /* No se usa más ni el LocalizacionTextBox ni el CuadernilloListBox ni el PaginaIntegerTextBox
            if($this->objLocalizacionTextBox->Text) {
                $objLocalizacion = Localizacion::LoadByCueanexo($this->objLocalizacionTextBox->Text);
                if($objLocalizacion) {
                    Session::setLocalizacion($objLocalizacion);
                    $blnDidSomething = true;
                } else {
                    return QApplication::DisplayAlert('Localización inválida');
                }
            }
            if($this->objCuadernilloListBox->SelectedValue) {
                if (array_key_exists($this->objCuadernilloListBox->SelectedValue, Session::$arrNavegacionPagina) ||
                    array_key_exists($this->objCuadernilloListBox->SelectedValue, Session::$arrNavegacionCuadro)) {
                    $strCuadernillo = $this->objCuadernilloListBox->SelectedValue;
                } else {
                    return QApplication::DisplayAlert('Cuadernillo inválido para la localización');
                }
            } else {
                if(!$blnDidSomething) return QApplication::DisplayAlert('Debe seleccionar un cuadernillo');
            }
            if($this->objPaginaIntegerTextBox->Text) {
                // obtengo la pagina por el numero pasado para el cuadernillo seleccionado
                $objDefinicionPagina = DefinicionPagina::LoadByNombreCortoCuadernilloNumeroPagina($strCuadernillo, $this->objPaginaIntegerTextBox->Text);
                // verifica que la pagina corresponda al cuadernillo y a la localizacion segun las tablas datos_ 
                if($objDefinicionPagina && in_array($objDefinicionPagina->IdDefinicionPagina, Session::$arrNavegacionPagina[$strCuadernillo])) {
                    // generar url y redirigir
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/'.$strCuadernillo.'/pagina/'.$this->objPaginaIntegerTextBox->Text);
                } else {
                    return QApplication::DisplayAlert(sprintf('Página %s inválida para el cuadernillo %s de la localización %s',
                                    $this->objPaginaIntegerTextBox->Text, $strCuadernillo, $objLocalizacion->Cueanexo));
                }
            }*/
            if($this->objCuadroNumberTextBox->Text) {
                // obtengo el cuadro por el numero pasado para el cuadernillo seleccionado
                 $arrDatosCuadro = DatosCuadro::QueryArray(QQ::AndCondition(QQ::Equal(QQN::DatosCuadro()->IdDatosCapituloObject->IdDatosCuadernilloObject->IdLocalizacion,$objLocalizacion->IdLocalizacion),QQ::Equal(QQN::DatosCuadro()->IdDefinicionCuadroObject->DefcuadroDefpaginaAsId->IdDefinicionPaginaObject->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto, $strCuadernillo),QQ::Equal(QQN::DatosCuadro()->IdDefinicionCuadroObject->Numero, $this->objCuadroNumberTextBox->Text)));
                 // verifica que el cuadro corresponda al cuadernillo y a la localizacion segun las tablas datos_
                 if(empty($arrDatosCuadro)) {
                     return QApplication::DisplayAlert(sprintf("El Cuadro %s no es válido para esta Localización.\r\nSi considera que el cuadro indicado corresponde a la localización se deben actualizar las Ofertas declaradas en el Padrón de Establecimientos.", $this->objCuadroNumberTextBox->Text));
                 }
                 $objDatosCuadro = array_pop($arrDatosCuadro);
                 $objDefinicionCuadro = $objDatosCuadro->IdDefinicionCuadroObject;

                foreach($objDefinicionCuadro->DefcuadroDefpaginaAsIdArray as $objDefCuadroDefPagina){
                    if($objDefCuadroDefPagina->IdDefinicionPaginaObject->IdDefinicionCapituloObject->IdDefinicionCuadernilloObject->NombreCorto == $strCuadernillo){
                        $objDefinicionPagina = $objDefCuadroDefPagina->IdDefinicionPaginaObject;
                        break;
                    }
                }
                // generar url y redirigir
                QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/'.$strCuadernillo.'/pagina/'.$objDefinicionPagina->Numero);
            } 
            if($strCuadernillo) {
                // Tengo localizacion y cuadernillo, ir a la primer pagina
                $objDefinicionPagina = DefinicionPagina::LoadFirstByNombreCortoCuadernillo($strCuadernillo);
                // verifica que la pagina corresponda al cuadernillo y a la localizacion segun las tablas datos_ 
                if($objDefinicionPagina && in_array($objDefinicionPagina->IdDefinicionPagina, Session::$arrNavegacionPagina[$strCuadernillo])) {
                    // generar url y redirigir
                    QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/'.$strCuadernillo.'/pagina/'.$objDefinicionPagina->Numero);
                } else { // puede pasar si solo hay cuadros y no paginas definidas? tambien si la primer pagina de un cuadernillo no corresponde a una localizacion
                    return QApplication::DisplayAlert('No hay páginas definidas en el cuadernillo para la localización');
                }
            }
            // Si solo setearon la localizacion va al listado de cuadernillos
            if ($blnDidSomething) {
                QApplication::Redirect(__VIRTUAL_DIRECTORY__.'/localizacion/view/'.$objLocalizacion->IdLocalizacion); 
            }
        }
}
?>
