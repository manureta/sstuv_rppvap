<?php

class ImposibleModificarCuadernilloConfirmadoException extends QCallerException{

        public function __construct($intIdDatosCuadernillo = 1){
            parent::__construct("No se puede modificar el cuadernillo $intIdDatosCuadernillo porque se encuentra Confirmado");
        }



}
