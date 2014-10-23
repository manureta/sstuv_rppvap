<?php
	// Generate the Error Dump
	if (!ob_get_level()) ob_start();
	require(__DOCROOT__ . __PHP_ASSETS__ . '/_core/error_dump.php');

	// Do We Log???
	if (defined('ERROR_LOG_PATH') && ERROR_LOG_PATH && defined('ERROR_LOG_FLAG') && ERROR_LOG_FLAG) {
		// Log to File in ERROR_LOG_PATH
		$strContents = ob_get_contents();

        QApplication::MakeDirectory(ERROR_LOG_PATH, 0777);
		$strFileName = ERROR_LOG_PATH . '/' . date('Y-m-d-H-i-s-' . rand(100,999)) . '.html';
        file_put_contents($strFileName, $strContents);
		@chmod($strFileName, 0666);

        /**
         * Send Mails to Admins group
         */
         if(defined('__ALLOW_EMAILS__') && __ALLOW_EMAILS__ && SERVER_INSTANCE == 'prod'){
            $objMessage = new QEmailMessage();
            $objMessage->From = __EMAIL_FROM__;
            $objMessage->To = __EMAIL_TO_LIST__;
            // puts the error content into the mail content
            $objMessage->HtmlBody = $strContents;
            // puts the entire file html attach
            $objFileAttach = new QEmailAttachment($strFileName);
            $objMessage->AddAttachment($objFileAttach);
            QEmailServer::Send($objMessage);
         }
        /**End send mail*/

	}

	if (QApplication::$RequestMode == QRequestMode::Ajax) {
		if (defined('ERROR_FRIENDLY_AJAX_MESSAGE') && ERROR_FRIENDLY_AJAX_MESSAGE) {
			// Reset the Buffer
			while(@ob_end_clean());

			// Setup the Friendly Response
			header('Content-Type: text/xml');
			$strToReturn = '<controls/><commands><command>alert("' . str_replace('"', '\\"', ERROR_FRIENDLY_AJAX_MESSAGE) . '");</command></commands>';
			if (QApplication::$EncodingType)
				printf("<?xml version=\"1.0\" encoding=\"%s\"?><response>%s</response>\r\n", QApplication::$EncodingType, $strToReturn);
			else
				printf("<?xml version=\"1.0\"?><response>%s</response>\r\n", $strToReturn);
			return false;
		}
	} else {
		if (defined('ERROR_FRIENDLY_PAGE_PATH') && ERROR_FRIENDLY_PAGE_PATH) {
			// Reset the Buffer
			while(@ob_end_clean());
			header("HTTP/1.1 500 Internal Server Error");
			require(__DOCROOT__ . ERROR_FRIENDLY_PAGE_PATH);
		}
	}
?>
