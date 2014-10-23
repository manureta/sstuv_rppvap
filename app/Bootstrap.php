<?php

class Bootstrap {

    public static $blnInstance;

    public static function Initialize() {
        // Check if an instance is already available
        if(!self::$blnInstance) {
            // If there's no instance, initialize the bootstrap
            self::$blnInstance = new Bootstrap();
        }
        return;
    }

    public function includeDependencies(){

        ///////////////////////////////////
        // Define Server-specific constants
        ///////////////////////////////////
        require(dirname(__FILE__).'/../config/configuration.inc.php');

        //////////////////////////////
        // Include the Qcodo Framework
        //////////////////////////////
        require(__QCODO_CORE__ . '/qcodo.inc.php');



        //////////////////////////////
        // Include Application class
        //////////////////////////////
        require('models/QApplication.class.php');

        //////////////////////////////
        // Include autoloads
        //////////////////////////////
        require('models/QAutoload.class.php');


    }

    public function initializeApp(){
        ////////////////////////////////////////////////
        // Initialize the Application
        ////////////////////////////////////////////////
        QAutoload::RegisterAutoload();
        QApplication::Initialize();
        QApplication::initializeCache();
        QApplication::initializeErrorHandling();
        QApplication::initializeDatabaseConnections();
        QApplication::initializeLanguage();
        QApplication::initializeQEMailServer();
        Session::Start();
    }

    public function  __construct() {
        $this->includeDependencies();
        $this->initializeApp();
    }


}

?>
