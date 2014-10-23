<?php

class InformacionGlobalCuilPanel extends QPanel {
    
    public $strHTMLContent;
    
    public function __construct($objParentObject, $strControlId = null) {

        $this->strHTMLContent = '';
        parent::__construct($objParentObject, $strControlId);
    }
    
    public function GetControlHtml() {
        return $this->strHTMLContent;
    }
    
    public function Calcular( Personal $objPersonal ){
        if(!$objPersonal){
            throw new Exception('InformacionGlobalCuilPanel se quiere calcular y el usuario es incorrecto.');
        }
        $strFechaReporte = QDateTime::NowToString('DD/MM/YYYY hhhh:mm:ss');
        $objUsuario = $objPersonal->UsuarioAsId;
        $strTelCompleto = '';
        $objPersonal->TelCodigoArea && $strTelCompleto = '('.$objPersonal->TelCodigoArea.') ';
        $objPersonal->TelNumero && $strTelCompleto.=$objPersonal->TelNumero;
        $this->strHTMLContent = <<< MyTxt
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="widget-box transparent invoice-box">
                <div class="widget-header widget-header-large">
                    <h3 class="grey lighter pull-left position-relative">
                        <i class="icon-user green"></i>
                        Información Global CUIL:&nbsp {$objUsuario->Nombre}
                    </h3>

                    <div class="widget-toolbar no-border invoice-info">
                        <span class="invoice-info-label">Fecha:</span>
                        <span class="blue">{$strFechaReporte}</span>
                    </div>

                </div>

                <div class="widget-body">
                    <div class="widget-main padding-24">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                        <b>Datos personales</b>
                                    </div>
                                </div>

                                <div>
                                    <ul class="list-unstyled  spaced">
                                        <li>
                                            <i class="icon-caret-right green"></i>
                                            Email: {$objUsuario->Email}
                                        </li>

                                        <li>
                                            <i class="icon-caret-right green"></i>
                                            Nombre: {$objPersonal->Nombre}
                                        </li>

                                        <li>
                                            <i class="icon-caret-right green"></i>
                                            Apellido: {$objPersonal->Apellido}
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <i class="icon-caret-right green"></i>
                                            Cuit / Cuil: {$objPersonal->Cuit}
                                        </li>

                                        <li>
                                            <i class="icon-caret-right green"></i>
                                            Dni: {$objPersonal->Dni}
                                        </li>
                                        <li>
                                            <i class="icon-caret-right green"></i>
                                            Numero Telefono: {$strTelCompleto}
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /span -->
                        </div><!-- row -->

                        <div class="space"></div>
                                            
                        <div class="row">
                            <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                <b>Puestos Laborales - Establecimientos</b>
                            </div>
                        </div>
                                            
                        <div class="space"></div>

                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Cue</th>
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
            QQ::Equal(QQN::UnidadServicio()->IdLocalizacionObject->IdEstablecimientoObject->PersonalEstablecimientoAsId->IdPersonal, $objPersonal->IdPersonal),
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
                                            <td>
                                                <a>{$objEstablecimiento->Cue}</a>
                                            </td>
                                            <td class="hidden-xs">
                                                {$objEstablecimiento->Nombre}
                                            </td>
                                            <td class="hidden-480"> {$objLocalizacion->Localidad} </td>
                                            <td>{$objLocalizacion->Cueanexo}</td>
                                            <td>{$objUnidadServicio->CNivelServicioObject->Descripcion}</td>
                                        </tr>
MyTxt;
        }
        if($iCant==0)$this->strHTMLContent.='<td colspan="6" class="center">Sin Puestos - Establecimientos</td>';
        
        $this->strHTMLContent .= <<< MyTxt
                                </tbody>
                            </table>
                        </div>
                
                    <div class="space"></div>
                                            
                        <div class="row">
                            <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                <b>Establecimientos como Director</b>
                            </div>
                        </div>
                                            
                        <div class="space"></div>

                        <div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Cue</th>
                                        <th class="hidden-xs">Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
MyTxt;
        $objEstablecimientoArray = Establecimiento::QueryArray( 
            QQ::Equal(QQN::Establecimiento()->IdDirector, $objPersonal->IdPersonal),
            QQ::Clause(
                QQ::OrderBy(QQN::Establecimiento()->Nombre,'asc')
             )
        );
        $iCant=0;
        foreach($objEstablecimientoArray as $objEstablecimiento){
            $iCant++;
            $this->strHTMLContent .= <<< MyTxt
                                 <tr>
                                        <td class="center">{$iCant}</td>
                                        <td>
                                            <a href="#">{$objEstablecimiento->Cue}</a>
                                        </td>
                                        <td class="hidden-xs">
                                            {$objEstablecimiento->Nombre}
                                        </td>
                                    </tr>
MyTxt;
        }
                if($iCant==0)$this->strHTMLContent.='<td colspan="3" class="center">No hay establecimientos</td>';
                $this->strHTMLContent .= <<< MyTxt
                                </tbody>
                            </table>
                        </div>      
                        <div class="hr hr8 hr-double hr-dotted"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
MyTxt;
    }

}
