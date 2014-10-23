<?php

class MenuPanel extends QPanel {

    public $pnlMenu;

    public function __construct($objParentObject, $strControlId = null) {

        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

    }

    /* function FixIconString($strIconSetted)
     * Fix para el tema de icon.
     * Por si se guarda la palabra icon- en la base. 
     * Ej. icon-bar-chart se transforma en icon-icon-bar-chart
     * Esta funcion soluciona el tema.
     * Actualmente no se usa. Se implemto cuando se trabajo con controles.
     * 
     */

    protected function FixIconString($strIconSetted) {
        if (preg_match('/icon-/', $strIconSetted))
            return str_replace('icon-', '', $strIconSetted);
        else
            return $strIconSetted;
    }

    /**
     * Construye el menu. Utiliza metodos privados recursivos.
     * @return string
     */
    protected function GetControlHtml() {

        $objUsuario = Session::getObjUsuario();
        $objPerfil = Session::getObjPerfilActivo();

        /*
         * Detalle:
         * Obtenemos los items de menu, que vienen del perfil. (Y ademas atributo accesible TRUE para TODOS)
         * Left Join la seccion de usuario a fin de obtener las posibles restricciones
         * o redefiniones de permisos.
         * La variable $objItemsMenuByPerfilArray[x]->objPerfilMenuAsId, siempre existe por definicion.
         * La re-definicion de los permisos y visibilidad se da cuando exista
         * $objItemsMenuByPerfilArray[x]->objUsuarioMenuAsId
         * Es indispensable el ORDER BY.
         * 
         * NOTAR:
         * Si un permiso de visibilidad se quita a un Item del Menu que
         * es padre. 
         * TODOS SUS HIJOS NO SON VISIBLES.
         * Los permisos tambien se heredan en este caso.
         */
        
        $objItemsMenuByPerfilArray = Menu::QueryArray( 
            QQ::AndCondition(
                    QQ::Equal(QQN::Menu()->PerfilMenuAsId->IdPerfil, $objPerfil->IdPerfil),
                    QQ::Equal(QQN::Menu()->Accesible, true),
                    QQ::OrCondition(QQ::Equal(QQN::Menu()->CNivelServicio,Session::getObjUnidadDeServicio()->CNivelServicio),
                     QQ::IsNull(QQN::Menu()->CNivelServicio)
                    )
                    ),
            QQ::Clause(
                QQ::Expand(
                    QQN::Menu()->PerfilMenuAsId
                ),
                QQ::Expand(
                    QQN::Menu()->UsuarioMenuAsId,
                    QQ::Equal(QQN::Menu()->UsuarioMenuAsId->IdUsuario, $objUsuario->IdUsuario)
                ),
                QQ::OrderBy(QQN::Menu()->Orden,'asc')
             )
        );
        
       
        /*
         * $objArbolMenuArray
         * De acuerdo a las tuplas de menu, se construlle un arbol para ser
         * leido secuencialmente.
         * Se evalua principalmente la tabla usuario_menu. Si existe un registro
         * en la relacion, se toma como valido los permisos sobre este. (Para
         * este caso la columna p_acceder)
         * Caso contrario, se toma como valido los permisos asignados al perfil.
         * 
         * Menu::QueryArray Toma unicamente los items del menu asignados al perfil.
         * 
         * Solo se toman en cuenta los items del menu ACCESIBLES y CON PERMISO DE ACCESO
         * En la posicion 0 van todos los padres roots. (Iniciales)
         * Ademas se crea un indice con dicho idMenu con un array vacio.
         * Esto indica que el item del menu NO TIENE HIJOS.
         * A medida que se leen Items del Menu. Se asigna el objeto al padre y
         * si no existe un indice se crea para indicar que es un item nuevo sin hijos.
         * Los hijos de los items que son padre iran aumentando su array a medida
         * que se vallan leyendo los registros dependientes del mismo.
         * 
         * Ej:
         * Menu:
         * -A
         * -B
         *  |-C
         *  |-D
         *    |-E
         *    |-F
         *  |-H
         * -I
         *  |-J
         * 
         * Registros del menu (id,nombre, padre)
         * 1    A   Null    (Padre Root)
         * 2    B   Null    (Padre Root)
         * 3    C   2       
         * 4    D   2       (Padre)    
         * 5    E   4   
         * 6    F   4
         * 7    G   2       (Padre)
         * 8    H   7
         * 9    I   Null    (Padre Root)
         * 10   J   9
         * 
         * La Matriz Creada Sera:
         * [0] Obj1,Obj2,Obj9
         * [1] 
         * [2] Obj3,Obj4,Obj7
         * [3]
         * [4] Obj5,Obj6
         * [5]
         * [6]
         * [7] Obj8
         * [8]
         * [9] Obj10
         * [10]
         * 
         * Se envia a procesar la Matriz a ParseMenuItems.
         * 
         */
        $objArbolMenuArray=array();
        foreach($objItemsMenuByPerfilArray as $objMenuItem){
            if( 
                 (       //Siempre evaluamos primero que no tenga restriccion de usuario.
                        ($objMenuItem->UsuarioMenuAsId && $objMenuItem->UsuarioMenuAsId->PAcceder) 
                        ||
                        (!$objMenuItem->UsuarioMenuAsId && $objMenuItem->PerfilMenuAsId->PAcceder) 
                 )
            ) {
                if($objMenuItem->IdMenuPadre==NULL) {
                    $objArbolMenuArray[0][$objMenuItem->IdMenu]=$objMenuItem;
                    $objArbolMenuArray[$objMenuItem->IdMenu]=Array();
                }
                else {
                    $objArbolMenuArray[$objMenuItem->IdMenuPadre][$objMenuItem->IdMenu]= $objMenuItem;
                    $objArbolMenuArray[$objMenuItem->IdMenu]=Array();
                }
            }
        }
        
        $strHtmlMenu = sprintf(
                '<div id="ID_To_ItemMenu">
            %s
            </div>', $this->ParseMenuItems($objArbolMenuArray)
        );
        
        return $strHtmlMenu;

    }
    
    /**
     * Procesa los items del menu padres root y envia los hijos a procesar recursivamente
     * @param type $objArbolMenuArray
     * @return string
     */
    protected function ParseMenuItems(&$objArbolMenuArray) {
        $strInnerULText = '';
        /*
         * Matriz de ejemplo obtenida:
         * La Matriz Creada Sera:
         * [0] Obj1,Obj2,Obj9
         * [1] 
         * [2] Obj3,Obj4,Obj7
         * [3]
         * [4] Obj5,Obj6
         * [5]
         * [6]
         * [7] Obj8
         * [8]
         * [9] Obj10
         * [10]
         * 
         * Solo procesamos los padres roots -> Indice 0.
         * Leemos uno a uno.
         * Si el objeto procesado tiene un ID que es indice (Array)
         * y esta vacio. Significa que no tiene hijos. Entonces creamos
         * el html hijo final y seguimos con el siguiente.
         * Si el objeto procesado tiene un ID que es indice (Array)
         * y no esta vacio. Significa que tiene hijos. Entonces creamos
         * el html contenedor y mandamos el mismo indice a ser procesado 
         * recursivamente para obtener todo el html interior a ParseMenuItemsChilds
         * 
         * El proceso termina cuando se recorren todos los items padre roots.
         */
        if(!isset($objArbolMenuArray[0])) return '';
        
        foreach($objArbolMenuArray[0] as $objMenuItem){
            
            $tagHref = '#';
                if ($objMenuItem->CTipoMenu == TipoMenuTipo::Controlador && $objMenuItem->NombreControlador != '' && $objMenuItem->NombreControlador != NULL) {
                    $tagHref = __VIRTUAL_DIRECTORY__ . '/' . $objMenuItem->NombreControlador;
                }
                
            if(
                    isset($objArbolMenuArray[$objMenuItem->IdMenu]) && 
                    count($objArbolMenuArray[$objMenuItem->IdMenu])==0
                    ){
                //Sin niveles no se ejecuta recursividad. Final.
                $strInnerULText.=sprintf('
                        <li>
                           <a href="%s">
                               <i class="%s"></i>
                               <span class="menu-text">%s</span>
                           </a>
                        </li>', $tagHref, $objMenuItem->Icono, $objMenuItem->Descripcion);
            }else{
                //Si tiene mas niveles empezamos la recursividad.
                if(isset($objArbolMenuArray[$objMenuItem->IdMenu])){
                    $strInnerULText.=sprintf('
                    <li>
                       <a href="%s" class="dropdown-toggle">
                           <i class="%s"></i>
                           <span class="menu-text">%s</span>
                            <b class="arrow icon-angle-down"></b>
                       </a>
                       <ul class="submenu">
                       %s
                       </ul>
                    </li>', $tagHref, $objMenuItem->Icono, $objMenuItem->Descripcion, $this->ParseMenuItemsChilds($objArbolMenuArray,$objMenuItem->IdMenu));
                }
            }
        }
        $strMenu = sprintf(
                '<ul id="menuRaiz" class="nav nav-list">' .
                '%s' .
                '</ul>', $strInnerULText);
        return $strMenu;
    }

    /**
     * Recorre los hijos de un Item del Menu Padre Root.
     * @param type $objArbolMenuArray
     * @param type $indice (a procesar)
     * @return string
     */
    protected function ParseMenuItemsChilds(&$objArbolMenuArray,$indice) {
        $strInnerULText='';
        /*
         * Matriz de ejemplo obtenida:
         * La Matriz Creada Sera:
         * [0] Obj1,Obj2,Obj9
         * [1] 
         * [2] Obj3,Obj4,Obj7
         * [3]
         * [4] Obj5,Obj6
         * [5]
         * [6]
         * [7] Obj8
         * [8]
         * [9] Obj10
         * [10]
         * 
         * Procesamos un Item del Menu Padre. Por ejemplo
         * Obj2.
         * Si existe en la matriz y el contenido es un array vacio, es
         * condicion de corte. tramo final.
         * Si tiene un array con hijos. Se arma un html contenedor
         * y se manda a procesar los hijos.
         */
        foreach($objArbolMenuArray[$indice] as $objMenuItem){
            
            $tagHref = '#';
                if ($objMenuItem->CTipoMenu == TipoMenuTipo::Controlador && $objMenuItem->NombreControlador != '' && $objMenuItem->NombreControlador != NULL) {
                    $tagHref = __VIRTUAL_DIRECTORY__ . '/' . $objMenuItem->NombreControlador;
                }
                
            if(
                    isset($objArbolMenuArray[$objMenuItem->IdMenu]) && 
                    count($objArbolMenuArray[$objMenuItem->IdMenu])==0
                    ){
                $strInnerULText.=sprintf('
                        <li>
                           <a href="%s">
                               <i class="icon-double-angle-right"></i>
                               <span class="menu-text">%s</span>
                           </a>
                        </li>',$tagHref,$objMenuItem->Descripcion);
            }else{
                if(isset($objArbolMenuArray[$objMenuItem->IdMenu])){
                    $strInnerULText.=sprintf('
                        <li>
                           <a href="%s" class="dropdown-toggle">
                               <i class="icon-double-angle-right"></i>
                               <span class="menu-text">%s</span>
                               <b class="arrow icon-angle-down"></b>
                           </a>
                           <ul class="submenu">
                           %s
                           </ul>
                        </li>', $tagHref,  $objMenuItem->Descripcion, $this->ParseMenuItemsChilds($objArbolMenuArray,$objMenuItem->IdMenu));
                }
            }
        }
        return $strInnerULText;
    }
    

    /*
     * Actualmente no se usa. Las funciones andan por href /ficha...
     */

    public function lnkRedirect_Click($strFormId, $strControlId, $strParameter) {
        QApplication::Redirect($strParameter);
    }

    
    public function GetEndScript() {
        $strJavascript=Session::Get('blnMenuClicked')==true?'
                $( document ).ready(function() {
                   $("#menu-vertical-collapse-btn").click();
                });':'';
        return $strJavascript . parent::GetEndScript();
    }

}
