<?php

class CuadernilloDesconfirmadoException extends QCallerException{

        public function __construct($str = 'Se encontró un error en un Cuadernillo Confirmado'){
            LogHelper::Error($str);
            parent::__construct($str);
        }

}
