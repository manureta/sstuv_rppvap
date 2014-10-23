<?php
/**
 * Este es un panel índice que hereda de OpcionesEquipamientosIndexPanelGen
 * Puede sobreescribir los métodos de su padre para utilizar funcionalidad propia.
 * 
 */
class OpcionesEquipamientosIndexPanel extends OpcionesEquipamientosIndexPanelGen {

    public $strTitulo = 'OpcionesEquipamientos';
    public $strSubtitulo = '';

    public function GetBreadCrumb() {
        return array(
                'OpcionesEquipamientos'
            );
    }

}
?>