<?php
/**
 * Description of Inconsistencia
 *
 * @author jose
 * @property string $Descripcion the value for strDescripcion
 * @property integer $Codigo the value for intCodigo
 */
class Inconsistencia {

    protected $strDescripcion;
    protected $intCodigo;
    protected $blnisDeFila;
    protected $intTipoConsistenciaTypeId;

    public function __construct($strDescripcion, $intCodigo, $isFila = false) {
        $this->intCodigo = (int) $intCodigo;
        $this->strDescripcion = $strDescripcion;
        $this->blnisDeFila = $isFila;
    }

    public function __get($name) {
        switch ($name) {
            case 'isDeFila':
                return $this->blnisDeFila;
            case 'Codigo':
                return $this->intCodigo;
            case 'Descripcion':
                return $this->strDescripcion;
            case 'Tipo':
                return TipoConsistenciaType::ToString($this->intTipoConsistenciaTypeId);
        }
    }

    public function __toString() {
        return sprintf("%s %d - %s",$this->Tipo,$this->intCodigo,$this->strDescripcion);
    }
}

class InconsistenciaError extends Inconsistencia {

    public function __construct($strDescripcion, $intCodigo, $isFila = false) {
        $this->intTipoConsistenciaTypeId = TipoConsistenciaType::ERROR;
        parent::__construct($strDescripcion, $intCodigo, $isFila);
    }

}

class InconsistenciaAdvertencia extends Inconsistencia {

    public function __construct($strDescripcion, $intCodigo, $isFila = false) {
        $this->intTipoConsistenciaTypeId = TipoConsistenciaType::ADVERTENCIA;
        parent::__construct($strDescripcion, $intCodigo, $isFila);
    }

}

class InconsistenciaFaltante extends Inconsistencia {

    public function __construct($strDescripcion, $intCodigo, $isFila = false) {
        $this->intTipoConsistenciaTypeId = TipoConsistenciaType::FALTANTE;
        parent::__construct($strDescripcion, $intCodigo, $isFila);
    }

}
?>