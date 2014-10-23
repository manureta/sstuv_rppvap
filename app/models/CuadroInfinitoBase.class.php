<?php
/**
 * CuadroInfinitoBase es la subclase de negocio que implementa las funciones
 * específicas de los cuadros con filas infinitas.
 *
 * @author
 */
abstract class CuadroInfinitoBase extends CuadroBase {

    /**
     * Los cuadros tienen MAXIMO_FILAS filas definidas.
     * La cantidad de celdas del cuadro es igual a MAXIMO_FILAS x cant de columnas
     */
    const MAXIMO_FILAS = 100;

    /**
     * Cantidad de filas con datos.
     * Esta propiedad indica rápidamente hasta qué fila habría que mostrar.
     * @var integer
     */
    protected $intCountFilas = 0;

    /**
     * Cantidad de Filas a mostrar por default. Este parámetro puede ser
     * modificado a través de la interfaz de administración.
     * @var integer
     */
    protected $intCantidadFilasCrear;


   public function __construct() {
        $this->CrearColumnas();
        $this->DeshabilitarCeldas();
    }

    protected function CrearFilas() {
//        if (!$this->intCountFilas || $this->intCountFilas < $this->CantidadFilasCrear)
//               $intCantFilas =  $this->intCantidadFilasCrear;
//        else
               $intCantFilas =  ($this->intCountFilas) ? $this->intCountFilas : 1;
        //$intCantFilas = $this->intCountFilas?$this->intCountFilas:$this->intCantidadFilasCrear;
        for ($i = 0; $i<$intCantFilas; $i++) {
            $this->AddNewFila();
        }
    }

    /**
     * Devuelve el objeto fila de acuerdo al IdDefinicionFila
     * @param int $intIdDefinicionFila
     * @return Fila
     */
    public function GetFila($intIdFila) {
        if(!$this->arrFilas)
            $this->CrearFilas();
        if (!array_key_exists($intIdFila, $this->arrFilas)) {
            if (count($this->arrFilas) + 1 == $intIdFila)
                $this->AddNewFila();
            else 
                throw new Exception('No se puede crear fila no consecutiva');
        }
        return $this->arrFilas[$intIdFila];
    }

    public function AddNewFila() {
        $objFila = new Fila();
        $objFila->Nombre = '';
        $objFila->IdFila = ( count($this->arrFilas) + 1 );
        $objFila->Orden = $objFila->IdFila;
        $objFila->Cuadro = $this;
        $this->AddFila($objFila);
        $this->DeshabilitarCeldas();


        return $objFila;
    }

    public function Validate($blnSoloPropias = false) {
        $this->SeSaltearonFilas();
        parent::Validate($blnSoloPropias);

    }

    private function SeSaltearonFilas(){
        $filaAnteriorTieneUnValor = true;
        foreach ($this->GetFilas() as $objFila){
            //ACA esta la papa
            $tieneUnValor = false;
            foreach ($objFila->GetCeldas() as $objCelda){
                if($objCelda->Valor != ''){
                    $tieneUnValor = true;
                    break;
                }
                //aca esta en una celda vacia de la fila
            }
            //aca terminó de recorrer una fila si no tiene al menos un valor tiro el error y salgo del metodo.
            if($tieneUnValor && !$filaAnteriorTieneUnValor){
                $arrCeldas = $objFila->GetCeldas();
                $indices = array_keys($arrCeldas);
                $primerIndice = $indices[0];
                $objCelda = $arrCeldas[$primerIndice];
                // TODO: poner un numero de consistencia coherente
                $objCelda->addInconsistencia(new InconsistenciaError("Esta fila se encuentra a continuación de una fila vacía. Esto puede generar inconsistencias en la base de Datos. Por favor corrija esta situación.", 1021, true));
            }
            $filaAnteriorTieneUnValor = $tieneUnValor;
        }
        return false;
    }

    public function __get($strName) {
        switch ($strName) {
            case 'CountFilas':
                return $this->intCountFilas;
            case 'CantidadFilasCrear':
                return $this->intCantidadFilasCrear;
            default:
                return parent::__get($strName);
        }
    }

    public function __set($strName, $mixValue) {
        switch ($strName) {
            case 'CountFilas':
                $this->intCountFilas = $mixValue;
                for ($i = count($this->arrFilas); $i < $this->intCountFilas; $i++) {
                   $this->AddNewFila();
                }
               
            default:
                return parent::__set($strName, $mixValue);
        }
    }
    
    public function GetFilas() {
        if(!$this->arrFilas) {
            $this->CrearFilas();
        }
        if (!count($this->arrFilas)) {
            throw new QCallerException(sprintf('ERROR: No existen filas para el cuadro %d', $this->IdCuadro));
        }
        return $this->arrFilas;
    }

}


?>
