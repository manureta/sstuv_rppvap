<?php

require(__DATAGEN_CLASSES__ . '/UsuarioGen.class.php');

/**
 * The Usuario class defined here contains any
 * customized code for the Usuario class in the
 * Object Relational Model.  It represents the "usuario" table 
 * in the database, and extends from the code generated abstract UsuarioGen
 * class, which contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 * 
 * @package Relevamiento Anual
 * @subpackage DataObjects
 * 
 */
class Usuario extends UsuarioGen {

    /**
     * Default "to string" handler
     * Allows pages to _p()/echo()/print() this object, and to define the default
     * way this object would be outputted.
     *
     * Can also be called directly via $objUsuario->__toString().
     *
     * @return string a nicely formatted string representation of this object
     */
    public function __toString() {
        //Si el usuario tiene definido su id_personal, lo uso, sino busco relacion inversa desde personal
        return sprintf('%s',  $this->strNombre);
    }

    // This adds the created by and creation date before saving a new user
    public function Save($blnForceInsert = false, $blnForceUpdate = false) {
        //QApplication::Authenticate();
        if ((!$this->__blnRestored) || ($blnForceInsert)) {
            //$this->Createdby = QApplication::$objUser->IdUserbackend;
            //$this->Datecreated = new QDateTime(QDateTime::Now);
        } else {
            //$this->Modifiedby = QApplication::$objUser->IdUserbackend;
        }
        parent::Save($blnForceInsert, $blnForceUpdate);
    }

    public static function LoadByNombrePassword($strNombre, $strPassword, $objOptionalClauses = null) {
        // This will return an array of Usuario objects
        return Usuario::QuerySingle(
                        QQ::AndCondition(
                                QQ::Equal(QQN::Usuario()->Nombre, $strNombre), QQ::Equal(QQN::Usuario()->Password, $strPassword)
                        ), $objOptionalClauses
        );
    }

    public static function LoadByDni($strDni) {
        // This will return an array of Usuario objects
        return Usuario::QuerySingle(
                        QQ::Equal(QQN::Usuario()->IdPersonalObject->Dni, $strDni)
        );
    }

    public static function LoadByCuit($strCuit) {
        // This will return an array of Usuario objects
        return Usuario::QuerySingle(
                        QQ::Equal(QQN::Usuario()->IdPersonalObject->Cuit, $strCuit)
        );
    }

}

?>
