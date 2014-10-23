<?php
 // Standard inclusions   

require_once("pchart/pChart/pData.class");
require_once("pchart/pChart/pChart.class");
require('../../app/Bootstrap.php');
Bootstrap::Initialize();

function SqlToArray($objPdo, $idLocalizacion, $idGrafico, $idCuadernillo){
    /*
     * devuelve un array con:
     * _ array de datos 2012
     * _ array de datos 2011
     * _ altura de la imagen
     * _ cantidad de decimales
     * _ titulo
     * _ leyendas eje x
     * _ angulo de las leyendas del eje x
     * _ leyenda del eje y
     * 
     * pone die() si recibe un cuadernillo invalido, un grafico invalido para un cuadernillo determinado o si
     * no hay ningun dato para ese grafico, para esa localizacion. Si tiene registro(s) y esta(n) vacio(s)
     * lo muestra todo con ceros
     * 
     */
    
    $arr = array();
    $arr['label'] = null;
    $arr['angle'] = 90; // vertical por defecto
    $arr['lab2011'] = "2011";
    $arr['lab2012'] = "2012";
    $arr['sizey'] = 260; // altura por defecto
    $arr['decimales'] = 2; // decimales por defecto (lo que tomaria el pchart por defecto)
    switch($idCuadernillo){
        case 1: // celeste
            $arr['label'] = array("Año 1","Año 2","Año 3","Año 4","Año 5","Año 6","Año 7","Año 8","Año 9","Año 10","Año 11","Año 12","Año 13");
            $arr['sizey'] = 310;
            switch($idGrafico){
                case 1:
                    $strSql = sprintf("select * from ficha_escuela.comun_alumnos_anio_corrido where id_localizacion=%s",$idLocalizacion);
                    $arr['label'] = array("Maternal","Sala de 3","Sala de 4","Sala de 5","Año 1","Año 2","Año 3","Año 4","Año 5","Año 6","Año 7","Año 8","Año 9","Año 10","Año 11","Año 12","Año 13");
                    $arr['title'] = "Alumnos por año de estudio. Años 2012 y 2011";
                    $arr['labY'] = "Total de alumnos";
                    $arr['decimales'] = 0;
                    break;
                case 2:
                    $strSql = sprintf("select * from ficha_escuela.comun_sobreedad_anio_corrido where id_localizacion=%s",$idLocalizacion);
                    $arr['title'] = "Porcentaje de alumnos con sobreedad avanzada por año de estudio. Años 2012 y 2011";
                    $arr['labY'] = "Porcentaje de alumnos";
                    break;
                case 3:
                    $strSql = sprintf("select * from ficha_escuela.comun_promocion_anio_corrido where id_localizacion=%s",$idLocalizacion);
                    $arr['title'] = "Porcentaje de promoción por año de estudio. Años 2011-2012 y 2010-2011";
                    $arr['lab2011'] = "2010-2011";
                    $arr['lab2012'] = "2011-2012";
                    $arr['labY'] = "Porcentaje de alumnos";
                    break;
                case 4:
                    $strSql = sprintf("select * from ficha_escuela.comun_repitencia_anio_corrido where id_localizacion=%s",$idLocalizacion);
                    $arr['title'] = "Porcentaje de repitencia por año de estudio. Años 2012 y 2011";
                    $arr['labY'] = "Porcentaje de alumnos";
                    break;        
                case 5:
                    $strSql = sprintf("select * from ficha_escuela.comun_ssp_anio_corrido where id_localizacion=%s",$idLocalizacion);
                    $arr['title'] = "Porcentaje de salidos sin pase por año de estudio. Años 2011-2012 y 2010-2011";
                    $arr['lab2011'] = "2010-2011";
                    $arr['lab2012'] = "2011-2012";
                    $arr['labY'] = "Porcentaje de alumnos";
                    break;        
                default: die();
            }
            $stmt = $objPdo->query($strSql);
            $arrRess = $stmt->FetchAll();
            if(!count($arrRess)) die();
            foreach($arrRess as $arrRes){
                if($arrRes['anio']==2011){
                    $arr2011 = array();
                    $arrLabel = array();
                    foreach($arrRes as $nom => $val){
                        if(in_array($nom, array("id_localizacion", "cueanexo", "anio"))) 
                            continue;    
                        $arrLabel[] = $nom;
                        //$arr2011[] = $val?$val:'0';
                        $arr2011[] = $val;
                    }
                }
                else{
                    $arr2012 = array();                    
                    foreach($arrRes as $nom => $val){                        
                        if(in_array($nom, array("id_localizacion", "cueanexo", "anio"))) 
                            continue;    
                        //$arr2012[] = $val?$val:'0';
                        $arr2012[] = $val;
                    }
                }
            }
            break;
        case 2: // violeta
            $strCampo = "edad";
            $str2011 = "alumnos_2011_porc";
            $str2012 = "alumnos_2012_porc";
            $arr['angle']=0;
            switch($idGrafico){
                case 1:
                    $strSql = sprintf("select * from ficha_escuela.adultos_alumnos_oferta where id_localizacion=%s",$idLocalizacion);
                    $arr['title'] = "Alumnos por oferta educativa. Años 2012 y 2011";
                    $arr['labY'] = "Cantidad de alumnos";
                    $strCampo = "oferta";
                    $str2011 = "alumnos_2011";
                    $str2012 = "alumnos_2012";                    
                    $arr['decimales'] = 0;
                    break;
                case 2:
                    $strSql = sprintf("select * from ficha_escuela.adultos_alumnos_edad_porcentaje_primaria where id_localizacion=%s",$idLocalizacion);
                    $arr['title'] = "Nivel Primario/EGB. Porcentaje de alumnos por grupos de edad. Años 2012 y 2011";
                    $arr['labY'] = "Porcentaje de alumnos";
                    $strCampo = "edad";                    
                    break;
                case 3:
                    $strSql = sprintf("select * from ficha_escuela.adultos_alumnos_edad_porcentaje_secundaria where id_localizacion=%s",$idLocalizacion);
                    $arr['title'] = "Nivel Secundario. Porcentaje de alumnos por grupos de edad. Años 2012 y 2011";
                    $arr['labY'] = "Porcentaje de alumnos";
                    $strCampo = "edad";                    
                    break;                
                case 4:
                    $strSql = sprintf("select * from ficha_escuela.adultos_alumnos_edad_porcentaje_fp
 where id_localizacion=%s",$idLocalizacion);
                    $arr['title'] = "Formación Profesional. Porcentaje de alumnos por grupos de edad. Años 2012 y 2011";
                    $arr['labY'] = "Porcentaje de alumnos";
                    $strCampo = "edad";                    
                    break;      
                default: die();
            }
            $stmt = $objPdo->query($strSql);
            $arrRess = $stmt->FetchAll();
            $arr2011 = array();
            $arr2012 = array();
            $arrLabel = array();
            if(!count($arrRess)) die();
            foreach($arrRess as $arrRes){                
                $arrLabel[] = $arrRes[$strCampo];
                //$arr2011[] = $arrRes[$str2011]?$arrRes[$str2011]:'0';
                //$arr2012[] = $arrRes[$str2012]?$arrRes[$str2012]:'0';
                $arr2011[] = $arrRes[$str2011];
                $arr2012[] = $arrRes[$str2012];
            }
            break;
            case 3: // rosa
                $strSql = sprintf("select * from ficha_escuela.especial_integracion
 where id_localizacion=%s",$idLocalizacion);
                $stmt = $objPdo->query($strSql);
                $arrRess = $stmt->FetchAll();
                $arr2011 = array();
                $arr2012 = array();
                $arrLabel = array('');
                if(count($arrRess)!=1) die();
                $arr['labY'] = "Porcentaje de alumnos integrados";
                $arr['title'] = "Porcentaje de alumnos integrados a la educación común o de adultos. Años 2012 y 2011";
                $arr2011[] = $arrRess[0]['integracion_porc_2011']? $arrRess[0]['integracion_porc_2011']:'0';
                $arr2012[] = $arrRess[0]['integracion_porc_2012']? $arrRess[0]['integracion_porc_2012']:'0';
                break;
            default: die();
    }
    // el pchart pincha si recibe un array de n arrays vacios. Antes si venia vacio el dato, ponia cero siempre.
    // ahora se pone vacio y al final (ahora) verifico si los todos los arrays estan vacios, si lo estan,
    //  lleno todos con cero. Lo hago para que en la mayoria de los casos sea posible distinguir un cero de un
    // dato faltante
    $blnVacio = true;
    foreach($arr2011 as $myArray){
        if($myArray){
            $blnVacio = false;
            break;
        }
    }
    if($blnVacio){
        foreach($arr2011 as $key => $dummy){
            $arr2011[$key] = 0;
        }
    }
    $blnVacio = true;
    foreach($arr2012 as $myArray){
        if($myArray){
            $blnVacio = false;
            break;
        }
    }
    if($blnVacio){
        foreach($arr2012 as $key => $dummy){
            $arr2012[$key] = 0;
        }
    }
    $arr['2011'] = $arr2011;
    $arr['2012'] = $arr2012;    
    if($arr['label'] == null) $arr['label'] = $arrLabel;
    //die("<pre>".print_r($arr,true)."</pre>");
    return $arr;
}


$objPdo = Localizacion::GetDatabase();
if(!isset($_GET['id_grafico'])||!isset($_GET['id_localizacion'])||!isset($_GET['id_cuadernillo'])) die;

//
// Dataset definition 
$DataSet = new pData();
$arr = SqlToArray($objPdo, $_GET['id_localizacion'], $_GET['id_grafico'], $_GET['id_cuadernillo']);
$DataSet->AddPoint($arr["2012"],$arr["lab2012"]);
$DataSet->AddPoint($arr["2011"],$arr["lab2011"]);        
$DataSet->AddAllSeries();
$DataSet->SetSerieName($arr["lab2011"],$arr["lab2011"]);
$DataSet->SetSerieName($arr["lab2012"],$arr["lab2012"]);
$DataSet->SetYAxisName($arr["labY"]); 


//if(count($arr['label'])){
    $DataSet->AddPoint($arr["label"],"Label"); 
    $DataSet->SetAbsciseLabelSerie("Label");
//}

// Initialise the graph
$Test = new pChart(800,$arr['sizey']);
$Test->setFontProperties("pchart/Fonts/tahoma.ttf",8);
$Test->setGraphArea(60,30,780,200);
//$Test->drawFilledRoundedRectangle(7,7,693,283,5,240,240,240);
//$Test->drawRoundedRectangle(5,5,695,295,5,290,230,230);
$Test->drawGraphArea(255,255,255,FALSE);

if(!$arr['decimales']){
    // para evitar que si tiene menos de 5 y es entero y el valor max es menor a 5 repita numeros, por ej si el valor max es 1, muestra 0 0 0 1 1 1
    $maxY = max(array(max($arr['2011']),max($arr['2012'])));
    $Test->setFixedScale(0,$maxY,$maxY<5?$maxY:5);
}
$Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_START0,0,0,0,TRUE,$arr['angle'],$arr['decimales'],TRUE);
$Test->drawGrid(4,TRUE,255,255,255,50);

// seteo los colores (similares a los del excel)
$Test->setColorPalette(1, 51, 102, 255);
$Test->setColorPalette(0, 214, 0, 71);

// Draw the 0 line
$Test->setFontProperties("pchart/Fonts/tahoma.ttf",6);
$Test->drawTreshold(0,143,55,72,TRUE,TRUE);

// Draw the bar graph
$Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE,80);


// Finish the graph
$Test->setFontProperties("pchart/Fonts/tahoma.ttf",8);
$Test->drawLegend(280,$arr['sizey']-30,$DataSet->GetDataDescription(),255,255,255,-1,-1,-1,0,0,0,FALSE);
$Test->setFontProperties("pchart/Fonts/tahoma.ttf",12);
$Test->drawTitle(5,22,$arr["title"],0,0,0); 
$Test->setFontProperties("pchart/Fonts/tahoma.ttf",8);
$Test->drawTextBox(10,$arr['sizey']-20,690,$arr['sizey'],"Fuente: Relevamiento Anual 2012 y 2011.",0,0,0,0,ALIGN_LEFT,false);
$Test->Stroke(); 
        
?>