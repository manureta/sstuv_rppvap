<?php

class InformacionGlobalCuePanel extends QPanel {
    
    public $strHTMLContent;
    
    public function __construct($objParentObject, $strControlId = null) {
        $this->strHTMLContent = '';
        parent::__construct($objParentObject, $strControlId);
    }
    
    protected function GetControlHtml() {
        return $this->strHTMLContent;
    }
    
    
    public function Calcular( Establecimiento $objEstablecimiento ){
        if(!$objEstablecimiento){
            throw new Exception('InformacionGlobalCuePanel se quiere calcular y el Establecimiento es incorrecto.');
        }
        $objDirector = $objEstablecimiento->IdDirectorObject;
        $strFechaReporte = QDateTime::NowToString('DD/MM/YYYY hhhh:mm:ss');
        $strTelCompleto = '';
        $objDirector->TelCodigoArea && $strTelCompleto = '('.$objDirector->TelCodigoArea.') ';
        $objDirector->TelNumero && $strTelCompleto.=$objDirector->TelNumero;
        
        $strEmailDirector = $objDirector->UsuarioAsId->Email;
        
        if($objDirector->UsuarioAsId){
            $strRegistrado='SI';$strRegistradoClass='green';
        }else{
            $strRegistrado='NO';$strRegistradoClass='red';
        }
        
        $this->strHTMLContent = <<< MyTxt
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="widget-box transparent invoice-box">
                <div class="widget-header widget-header-large">
                    <h3 class="grey lighter pull-left position-relative">
                        <i class="icon-building blue"></i>
                        Información Global CUE:&nbsp {$objEstablecimiento->Cue} &nbsp "{$objEstablecimiento->Nombre}"
                    </h3>

                    <div class="widget-toolbar no-border invoice-info">
                        <span class="invoice-info-label">Fecha:</span>
                        <span class="green">{$strFechaReporte}</span>
                    </div>

                </div>

                <div class="widget-body">
                    <div class="widget-main padding-24">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                        <b>Datos del Director</b>
                                    </div>
                                </div>

                                <div>
                                    <ul class="list-unstyled  spaced">
                                        <li>
                                            <i class="icon-caret-right blue"></i>
                                            Nombre: {$objDirector->Nombre}
                                        </li>

                                        <li>
                                            <i class="icon-caret-right blue"></i>
                                            Apellido: {$objDirector->Apellido}
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <i class="icon-caret-right blue"></i>
                                            Cuit / Cuil: {$objDirector->Cuit}
                                        </li>
                                        
                                        <li>
                                            <i class="icon-caret-right blue"></i>
                                            Email: {$strEmailDirector}
                                        </li>
                                        <li>
                                            <i class="icon-caret-right blue"></i>
                                            Dni: {$objDirector->Dni}
                                        </li>
                                        <li>
                                            <i class="icon-caret-right blue"></i>
                                            Numero Telefono: {$strTelCompleto}
                                        </li>
                                        <li>
                                            <i class="icon-caret-right blue"></i>
                                                <span class="invoice-info-label">Registrado: </span>
                                                <span class="{$strRegistradoClass}">{$strRegistrado}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /span -->
                        </div><!-- row -->

                        <div class="space"></div>
                                            
                        <div class="row">
                             <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                <b>Ofertas</b>
                            </div>
                        </div>
                                            
                        <div class="space"></div>

                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th class="hidden-xs">Nombre</th>
                                        <th class="hidden-xs">Localidad</th>
                                        <th class="hidden-480">Anexo</th>
                                        <th>Oferta</th>
                                    </tr>
                                </thead>
                                <tbody>
MyTxt;
        $iCant=0;
         $objUnidadServicioArray = UnidadServicio::QueryArray( 
            QQ::Equal(QQN::UnidadServicio()->IdLocalizacionObject->IdEstablecimiento, $objEstablecimiento->IdEstablecimiento),
            QQ::Clause(
                QQ::OrderBy(QQN::UnidadServicio()->CNivelServicioObject->Descripcion,'asc')
             )
        );
         
         foreach($objUnidadServicioArray as $objUnidadServicio ){
            $objLocalizacion = $objUnidadServicio->IdLocalizacionObject;
            $objEstablecimiento = $objLocalizacion->IdEstablecimientoObject;
            $iCant++;
            $this->strHTMLContent .= <<< MyTxt
                                        <tr>
                                            <td class="center">{$iCant}</td>
                                            <td class="hidden-xs">
                                                {$objLocalizacion->Nombre}
                                            </td>
                                            <td class="hidden-480"> {$objLocalizacion->Localidad} </td>
                                            <td>{$objLocalizacion->Cueanexo}</td>
                                            <td>{$objUnidadServicio->CNivelServicioObject->Descripcion}</td>
                                        </tr>
MyTxt;
        }
        

        if($iCant==0)$this->strHTMLContent.='<td colspan="5" class="center">Sin Localizaciones</td>';
        $this->strHTMLContent .= <<< MyTxt
                                </tbody>
                            </table>
                        </div>
MyTxt;
            $this->strHTMLContent .= <<< MyTxt
                    
                    <div class="row">
                             <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                <b>Personal Vinculado</b>
                            </div>
                        </div>
                    
                    <div class="space"></div>

                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th class="hidden-xs">Nombre</th>
                                        <th class="hidden-xs">Apellido</th>
                                        <th class="hidden-480">Cuit / Cuil</th>
                                        <th class="hidden-480">Dni</th>                                            
                                    </tr>
                                </thead>
                                <tbody>
MyTxt;
        $iCant=0;
        $objPersonalArray= Personal::QueryArray( 
            QQ::Equal(QQN::Personal()->PersonalEstablecimientoAsId->IdEstablecimiento, $objEstablecimiento->IdEstablecimiento),
            QQ::Clause(
                QQ::OrderBy(QQN::Personal()->Nombre,'asc')
             )
        );
         
         foreach($objPersonalArray as $objPersonal ){
            $iCant++;
            $strTelCompleto = '';
            $objPersonal->TelCodigoArea && $strTelCompleto = '('.$objPersonal->TelCodigoArea.') ';
            $objPersonal->TelNumero && $strTelCompleto.=$objPersonal->TelNumero;
            $this->strHTMLContent .= <<< MyTxt
                                        <tr>
                                            <td class="center">{$iCant}</td>
                                            <td class="hidden-xs">
                                                {$objPersonal->Nombre}
                                            </td>
                                            <td class="hidden-480"> {$objPersonal->Apellido} </td>
                                            <td>{$objPersonal->Cuit}</td>
                                            <td>{$objPersonal->Dni}</td>
                                        </tr>
MyTxt;
        }
        
        if($iCant==0)$this->strHTMLContent.='<td colspan="5" class="center">Sin Vinculaciones</td>';
        $this->strHTMLContent .= <<< MyTxt
                                </tbody>
                            </table>
                        </div>
MyTxt;
            $this->strHTMLContent .= <<< MyTxt
                    
                    <div class="row">
                             <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                <b>Estado de carga del Establecimiento</b>
                            </div>
                        </div>
                    
                    <div class="space"></div>

                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th class="hidden-xs">Anexo</th>
                                        <th class="hidden-xs">Nombre</th>
                                        <th class="hidden-480">Estado de Carga</th>
                                    </tr>
                                </thead>
                                <tbody>
MyTxt;
        $iCant=0;
        $objLocalizacionArray=Localizacion::QueryArray( 
            QQ::Equal(QQN::Localizacion()->IdEstablecimiento, $objEstablecimiento->IdEstablecimiento),
            QQ::Clause(
                QQ::OrderBy(QQN::Localizacion()->Cueanexo)
             )
        );
    
         
         foreach($objLocalizacionArray as $objLocalizacion ){
            $strEstado='##';
            //$objLocalizacion->ActualizarEstado();
            if (array_key_exists($objLocalizacion->CEstado, EstadoType::$NameArray)) {
                $strEstado = EstadoType::$NameArray[$objLocalizacion->CEstado];
            } else {
                $strEstado = EstadoType::$NameArray[EstadoType::Encarga];
            }
            
            $iCant++;
            $strTelCompleto = '';
            $objPersonal->TelCodigoArea && $strTelCompleto = '('.$objPersonal->TelCodigoArea.') ';
            $objPersonal->TelNumero && $strTelCompleto.=$objPersonal->TelNumero;
            $this->strHTMLContent .= <<< MyTxt
                                        <tr>
                                            <td class="center">{$iCant}</td>
                                            <td class="hidden-xs">
                                                {$objLocalizacion->Cueanexo}
                                            </td>
                                            <td class="hidden-480"> {$objLocalizacion->Nombre} </td>
                                            <td>{$strEstado}</td>
                                        </tr>
MyTxt;
        }
        
        if($iCant==0)$this->strHTMLContent.='<td colspan="5" class="center">Sin Anexos</td>';
        $this->strHTMLContent .= <<< MyTxt
                                </tbody>
                            </table>
                        </div>
<!-- corte -->
                        <div class="hr hr8 hr-double hr-dotted"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
MyTxt;
    }
        
}
