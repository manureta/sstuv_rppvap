<?php
/**
* Caracteristicas
* Migración de Caracteristicas
*/
abstract class MigracionCaracteristicas extends MigracionBase {

    protected static $_arrCaracteristicasTipo = array(
        //Cooperativa
        "184000681000606" => 21,    // con personeria juridica
        "184000681000607" => 22,    // sin personeria juridica
        "184000681000648" => 23,    // no tiene

        //Alternancia
        "185000221000050" => 31,    // si
        "185000222000050" => 32,    // no
        
        //Cercania organismo estatal
        "187000221000050" => 45,    // Si
        "187000222000050" => 44,    // no
        "421000354000449" => 41,    // nacional
        "421000355000449" => 42,    // provincial
        "421000356000449" => 43,    // municipal
        //Energia electrica
        "190000221000050" => 68,    // Si
        "190000222000050" => 67,    // no
        "487000467000581" => 61,    // red publica
        "487000466000581" => 62,    // grupo electrogeno
        "487000468000581" => 63,    // panel fotovoltaico / solar
        "487000469000581" => 64,    // generador eolico
        "487000470000581" => 65,    // generador hidraulico
        "487000471000581" => 66,    // otro
        
        //En la zona 1Km en la que esta ubicado
        "189000357000046" => 51,    // Si
        "189000357000047" => 53,    // no
        "189000358000046" => 52,    // Si
        "189000358000047" => 54,    // no

        //Se trata del personal

        
        "709000431000046" => 261,   //si
        "709000431000047" => 262,   //no
        "710000691000046" => 275,   //personal del estableciimiento(si)
        "710000691000047" => 276,   //personal del estableciimiento(no)
        "710000692000046" => 277,   //personal enviado por el nivel central(si)
        "710000692000047" => 278,   //personal enviado por el nivel central(no)
        "710000693000046" => 279,   //otro tipo de servicio(si)
        "710000693000047" => 280,   //otro tipo de servicio(no)
        // El establecimiento Funciona en 
        "369000681000601" => 241,    //(601) Institución Educativa
        "369000681000602" => 242,    //(602) Sindicato
        "369000681000603" => 243,    //(603) Empresa
        "369000681000604" => 244,    //(604) Otros
        
        "679000681000601" => 241,    // funciona en (601) Institución Educativa
        "679000681000602" => 242,    //(602) Sindicato
        "679000681000603" => 243,    //(603) Empresa
        "679000681000604" => 244,    //(604) Otros
        "679000681000605" => 274,    //(605) Institución de Salud




        //Equipamiento
        //Televisor
        "191000359000046" => 71,    // si
        "191000359000047" => 72,    // no
        //Video reproductor / videograbadora
        "191000360000046" => 73,    // si
        "191000360000047" => 74,    // no
        //Sistema multimedia o canion
        "191000361000046" => 75,    // si
        "191000361000047" => 76,    // no
        //Scanner
        "191000362000046" => 77,    // si
        "191000362000047" => 78,    // no
        //Camara de video para computadora (webcam)
        "191000363000046" => 79,    // si
        "191000363000047" => 80,    // no
        //Recproductor de cd
        "191000364000046" => 81,    // si
        "191000364000047" => 82,    // no
        //Recproductor de dvd
        "191000365000046" => 83,    // si
        "191000365000047" => 84,    // no
        //Impresora
        "191000366000046" => 85,    // si
        "191000366000047" => 86,    // no
        //Equipo emisor de radio AM/FM
        "191000682000046" => 87,    // si
        "191000682000047" => 88,    // no
        //Equipo receptor de radio AM/FM    
        "191000683000046" => 94,    // si
        "191000683000047" => 95,    // no    
        //Servidor para uso escolar
        "191000684000046" => 94,    // si
        "191000684000047" => 95,    // no     
           
        //Computadora
        "192000221000050" => 91,    // si
        "192000222000050" => 92,    // no
         
        //Hay docentes en informatica
        "193000221000050" => 101,    // si
        "193000222000050" => 102,    // no
         
        //Hay en el resto del personal quien sepa utilizar la computadora
        "194000221000050" => 111,    // si
        "194000222000050" => 112,    // no
         
        //Estan las computadoras en red
        "195000221000050" => 121,    // si
        "195000222000050" => 122,    // no
         
        //Posee Conexion a internet
        "280000221000050" => 131,    // si
        "280000222000050" => 132,    // no
                
        //Internet. Tipo de servicio
        "197000367000050" => 141,    // gratuito
        "197000368000050" => 142,    // pago
         
        //Internet. Tipo de conexion
        "282000369000241" => 151,    // telefonico
        "282000370000241" => 152,    // adsl
        "282000371000241" => 153,    // cable modem
        "282000372000241" => 154,    // satelital
        "282000373000241" => 155,    // otro tipo
        "282000760000241" => 156,    // internet movil
         
        //Internet. Restricciones en el tiempo de uso
        "199000221000050" => 161,    // si
        "199000222000050" => 162,    // no
          
        //Internet. Causa de las restricciones
        "498000223000439" => 171,    // no puede cubrir los costos
        "498000224000439" => 172,    // tiene una sola linea telefonica
        "498000225000439" => 173,    // otra
         

        //Se realizan actividades de ensenianza utilizando internet
        "706000431000046" => 181,    // si
        "706000431000047" => 182,    // no
         
        //"¿EL ESTABLECIMIENTO RECIBE CONTENIDOS EDUCATIVOS DIGITALES DE ORGANISMOS ESTATALES (NACIONAL, PROVINCIAL, MUNICIPAL)?"
        "707000431000046" =>255, // si
        "707000431000047" =>256, // no
        //"¿EL ESTABLECIMIENTO CUENTA CON UN ESPACIO VIRTUAL (SITIO WEB INSTITUCIONAL, AULA VIRTUAL, BANCO DE INFORMACION) PARA REUNIR MATERIALES DE USO PEDAGOGICO DESTINADOS AL PERSONAL DOCENTE?"

        "708000431000046" =>258, // si
        "708000431000047" =>259, // no
        
        //"(Verde) ¿EL ESTABLECIMIENTO CUENTA CON UNA PLATAFORMA VIRTUAL DE EDUCACION A DISTANCIA?"
        "711000431000046" =>264, // si
        "711000431000047" =>265, // no

        //"(Verde) ¿EL ESTABLECIMIENTO PROPORCIONA UN ESPACIO VIRTUAL(CAMPOS VIRTUAL, AULA VIRTUAL) PARA EL DESARROLLO DE CLASES?"

        "712000431000046" =>267, // si
        "712000431000047" =>268, // no



        //Tipo de software
        //Procesador de texto
        "202000218000046" => 191,    // si
        "202000218000047" => 192,    // no
        //Planilla de calculo
        "202000219000046" => 193,    // si
        "202000219000047" => 194,    // no
        //Presentaciones
        "202000406000046" => 195,    // si
        "202000406000047" => 196,    // no
        //Editor de sitios web
        "202000407000046" => 197,    // si
        "202000407000047" => 198,    // no
        //Disenio
        "202000408000046" => 199,    // si
        "202000408000047" => 200,    // no
        //Base de datos
        "202000409000046" => 201,    // si
        "202000409000047" => 202,    // no
        //Lenguaje de programacion
        "202000410000046" => 203,    // si
        "202000410000047" => 204,    // no
        // software educ de mate
        "202000686000046" => 464,    // si
        "202000686000047" => 465,    // no
         // software educ de Leng
        "202000687000046" => 466,    // si
        "202000687000047" => 467,    // no
         // software educ de C.Soc
        "202000688000046" => 468,    // si
        "202000688000047" => 469,    // no
         // software educ de Cs Natu
        "202000689000046" => 470,    // si
        "202000689000047" => 471,    // no
         // software educ.de otras
        "202000690000046" => 472,    // si
        "202000690000047" => 473,    // no
        
        //Otros
        "202000491000046" => 205,    // si
        "202000491000047" => 206,    // no
         
        //Dispone de sala o laboratorio de informatica
        "203000221000050" => 211,    // si
        "203000222000050" => 212,    // no
         
        //Es un Instituto de Formacion Docente
        //No acreditado
        "471000540000046" => 221,    // si
        "471000540000047" => 222,    // no
        //Acreditado con reservas
        "471000541000046" => 223,    // si
        "471000541000047" => 224,    // no
        //Con acreditacion plena
        "471000542000046" => 225,    // si
        "471000542000047" => 226,    // no
          
        //Indique si el establecimiento posee :
        //Programa y/o Departamento de Capacitacion
        "509000545000046" => 231,    // si
        "509000545000047" => 232,    // no
        //Programa y/o Departamento de Investigacion
        "509000546000046" => 233,    // si
        "509000546000047" => 234,    // no
        //Programa y/o Departamento de Extension a la Comunidad
        "509000547000046" => 235,    // si
        "509000547000047" => 236,    // no

        //"Funciona en el establecimiento CAI"
        "183000685000046" => 252,    // si
        "183000685000047" => 253,    // no
        //"Funciona en el establecimiento CAJ"
        "183000403000046" => 246,    // si
        "183000403000047" => 247,    // no
        //"Funciona en el establecimiento Proyecto Espacio Puente"
        "183000404000046" => 249,    // si
        "183000404000047" => 250,    // no


        //Sistema comutarizado de Gestión
        "716000221000050" => 307, // Si
        "716000222000050" => 308, // No

        "590000622000582" => 301, //Provisto por el Ministerio  de Educación
        "590000623000582" => 302, //Desarrollado por Terceros
        "590000625000582" => 303, // Encargado por el Estableciento
        "590000626000582" => 305, // No usamos Sistema
        
        
        //Equipamiento biblioteca
        //Televisor
        "719000359000619" => 341,    // si
        "719000359000620" => 342,    // no
        //Video reproductor / videograbadora
        "719000360000619" => 343,    // si
        "719000360000620" => 344,    // no
        //Sistema multimedia o canion
        "719000361000619" => 345,    // si
        "719000361000620" => 346,    // no
        //Scanner
        "719000362000619" => 347,    // si
        "719000362000620" => 348,    // no
        //Camara de video para computadora (webcam)
        "719000363000619" => 349,    // si
        "719000363000620" => 350,    // no
        //Recproductor de cd
        "719000364000619" => 351,    // si
        "719000364000620" => 352,    // no
        //Recproductor de dvd
        "719000365000619" => 353,    // si
        "719000365000620" => 354,    // no
        //Impresora
        "719000366000619" => 355,    // si
        "719000366000620" => 356,    // no
        //Equipo emisor de radio AM/FM
        "719000682000619" => 357,    // si
        "719000682000620" => 358,    // no
        //Equipo receptor de radio AM/FM    
        "719000683000619" => 364,    // si
        "719000683000620" => 365,    // no    
        //Servidor para uso escolar
        "719000684000619" => 366,    // si
        "719000684000620" => 367,    // no        
        
        //EXISTENCIA DE BIBLIOTECA ¿En el establecimiento funciona al menos una biblioteca?
        "673000221000050" => 338,    // si
        "673000222000050" => 339,    // no    
        
        //¿EMPLEA SOFTWARE ESPECÍFICO PARA LA GESTIÓN BIBLIOTECARIA (En caso afirmativo, indique cuáles de los siguientes:)
        //(694) Aguapey 		
        "717000694000046" => 360,    // si
        "717000694000047" => 361,    // no
        //(695) Sigebi 		
        "717000695000046" => 362,    // si
        "717000695000047" => 363,    // no        
        //(696) ISIS(Microisis, winisis, genisis etc) 		
        "717000696000046" => 368,    // si
        "717000696000047" => 369,    // no        
        //(697) Catalis 		
        "717000697000046" => 370,    // si
        "717000697000047" => 371,    // no        
        //(698) Marco Polo 		
        "717000698000046" => 372,    // si
        "717000698000047" => 373,    // no        
        //(699) Campi 		
        "717000699000046" => 374,    // si
        "717000699000047" => 375,    // no        
        //(700) Software propio 		
        "717000700000046" => 376,    // si
        "717000700000047" => 377,    // no        
        //(701) Software comercial 		
        "717000701000046" => 378,    // si
        "717000701000047" => 379,    // no        
        //(702) PMB 		
        "717000702000046" => 380,    // si
        "717000702000047" => 381,    // no        
        //(703) ABCD 		
        "717000703000046" => 382,    // si
        "717000703000047" => 383,    // no        
        //(704) BIBES 		
        "717000704000046" => 384,    // si
        "717000704000047" => 385,    // no        
        //(705) KOHA 		
        "717000705000046" => 386,    // si
        "717000705000047" => 387,    // no        
        //(706) Sistema propio en planilla de cálculo 		
        "717000706000046" => 388,    // si
        "717000706000047" => 389,    // no        
        //(491) Otros
        "717000491000046" => 390,    // si
        "717000491000047" => 391,    // no        
        
        //CANTIDAD DE LIBROS
        "721000707000648" => 393,    //(648) No tiene
        "721000707000636" => 394,    //(636) 1 a 400
        "721000707000637" => 395,    //(637) 401 a 1000
        "721000707000638" => 396,    //(638) 1001 a 4000
        "721000707000639" => 397,    //(639) 4001 a 7000
        "721000707000640" => 398,    //(640) 7001 y más
        
        //CANTIDAD DE EJEMPLARES POR SOPORTE
        //Publicaciones periódicas
        "722000708000648" => 400,    //(648) No tiene
        "722000708000641" => 401,    //(641) 1 a 250
        "722000708000642" => 402,    //(642) 251 a 500
        "722000708000643" => 403,    //(643) 501 a 1000
        "722000708000644" => 404,    //(644) 1001 a 3000
        "722000708000645" => 405,    //(645) 3001 y más
        //Mapas y láminas
        "722000709000648" => 406,    //(648) No tiene
        "722000709000641" => 407,    //(641) 1 a 250
        "722000709000642" => 408,    //(642) 251 a 500
        "722000709000643" => 409,    //(643) 501 a 1000
        "722000709000644" => 410,    //(644) 1001 a 3000
        "722000709000645" => 411,    //(645) 3001 y más
        //Audiovisuales (películas, videos, diapositivas)
        "722000710000648" => 412,    //(648) No tiene
        "722000710000641" => 413,    //(641) 1 a 250
        "722000710000642" => 414,    //(642) 251 a 500
        "722000710000643" => 415,    //(643) 501 a 1000
        "722000710000644" => 416,    //(644) 1001 a 3000
        "722000710000645" => 417,    //(645) 3001 y más
        //Recursos electrónicos (CD-ROM,DVD,disquetes
        "722000711000648" => 418,    //(648) No tiene
        "722000711000641" => 419,    //(641) 1 a 250
        "722000711000642" => 420,    //(642) 251 a 500
        "722000711000643" => 421,    //(643) 501 a 1000
        "722000711000644" => 422,    //(644) 1001 a 3000
        "722000711000645" => 423,    //(645) 3001 y más 	 	 	 	 	
        //Grabaciones sonoras (musicales y no)/(CD/MP3, etc)
        "722000712000648" => 424,    //(648) No tiene
        "722000712000641" => 425,    //(641) 1 a 250
        "722000712000642" => 426,    //(642) 251 a 500
        "722000712000643" => 427,    //(643) 501 a 1000
        "722000712000644" => 428,    //(644) 1001 a 3000
        "722000712000645" => 429,    //(645) 3001 y más 	 	 	 	 	        
        //Juegos
        "722000713000648" => 430,    //(648) No tiene
        "722000713000641" => 431,    //(641) 1 a 250
        "722000713000642" => 432,    //(642) 251 a 500
        "722000713000643" => 433,    //(643) 501 a 1000
        "722000713000644" => 434,    //(644) 1001 a 3000
        "722000713000645" => 435,    //(645) 3001 y más 	 	

        //TIENE CONVENIO CON UNIVERSIDADES, EMPRESAS, SINDICATOS, ONG U OTROS:
        "414000221000050" => 437, // Si
        "414000222000050" => 438, // No

    );

    protected static $_arrCuantos = array(
        "194000221000050" => 624,
        "193000221000050" => 623
    );

    protected static $_arrCuadrosSiNoCuantos = array(
        "183000685000046" => "183000685000623",    // si CAI
        "183000403000046" => "183000403000623",    // si CAJ
        "183000404000046" => "183000404000623",    // si Puente
    );

    /**
    * @return boolean
    */
    public static function Ejecutar($objCuadro){

        $objLocalizacion = $objCuadro->Localizacion;

        foreach($objCuadro->GetFilas() as $objFila){
            if(!$objFila->IsEmpty()){
                foreach($objFila->GetCeldas() as $objCelda){
                    $intIdCelda = $objCelda->IdDefinicionCelda;
                    if(!isset(self::$_arrCaracteristicasTipo[$objCelda->IdDefinicionCelda]) && !in_array($objCelda->Columna->IdDefinicionColumna,array(623,506)))
                       throw new MigrationException('Error migrando Características: Celda no contemplada '.$objCelda->IdDefinicionCelda);
                    if($objCelda->Valor == 'on'){
                       $objCaracteristica = self::GetCaracteristica($objLocalizacion,self::$_arrCaracteristicasTipo[$objCelda->IdDefinicionCelda]);
                        //QApplication::DisplayAlert("ddd ". $objCaracteristica);
                        if(isset(self::$_arrCuantos[$objCelda->IdDefinicionCelda])){
                            $objCuadroCuantosDao = new CuadroDao();
                            $objCuadroCuantos = $objCuadroCuantosDao->LoadCuadro(self::$_arrCuantos[$objCelda->IdDefinicionCelda],$objLocalizacion);
                            foreach($objCuadroCuantos->GetFilas() as $objFilaCuantos){
                                foreach($objFilaCuantos->GetCeldas() as $objCeldaCuantos){
                                    $objCaracteristica->Cuantos = $objCeldaCuantos->Valor;
                                }
                            }
                        }
                        if(isset(self::$_arrCuadrosSiNoCuantos[$objCelda->IdDefinicionCelda])){
                            foreach($objFila->GetCeldas() as $objCeldaCuadroSinoCuantos){
                                if($objCeldaCuadroSinoCuantos->IdDefinicionCelda == self::$_arrCuadrosSiNoCuantos[$objCelda->IdDefinicionCelda]){
                                    $objCaracteristica->Cuantos = $objCeldaCuadroSinoCuantos->Valor;
                                    break;
                                }
                            }
                        }
                        
                        $objCaracteristica->Save();
                    }

                }
            }
        }

    }

    public static function GetCaracteristica($objLocalizacion, $intCCaracteristica){
        $objCaracteristica = OLTPCaracteristicas::LoadByIdLocalizacionCCaracteristica($objLocalizacion->IdLocalizacion,$intCCaracteristica);
        if(!$objCaracteristica){
            $objCaracteristica = new OLTPCaracteristicas();
            $objCaracteristica->IdLocalizacionObject = $objLocalizacion;
            $objCaracteristica->CCaracteristica = $intCCaracteristica;
        }
        return $objCaracteristica;
    }

}
?>
