<?php
/**
 * Description of PhpMailer
 *
 * @author hcisneros
 */

require(__QCODO_CORE__.'/../phpmailer/class.phpmailer.php');

class QEmailServer extends QEmailServerBase {

    public static $objPhpMailer;

    public static function  InitializePhpMailer() {
        self::$objPhpMailer = new PHPMailer();
        self::$objPhpMailer->SMTPDebug = false;
    }

    public static function Send(QEmailMessage $objMessage) {
        if (defined('__EMAIL_SMTP_SERVER__') && __EMAIL_SMTP_SERVER__) {
            self::$objPhpMailer->IsSMTP();
        }
        try {
            self::SyncProperties($objMessage);
        } catch (Exception $e) {
            throw $e;
        }
        try {
            if (@self::$objPhpMailer->Send()) {
                return true;
            } else {
                LogHelper::Log('ERROR: Phpmailer no pudo enviar el email. '.self::$objPhpMailer->ErrorInfo,'error.log');
                throw new Exception(self::$objPhpMailer->ErrorInfo);
            }
        } catch (Exception $e) {
            LogHelper::Log('Exception QEmailServer '.self::$objPhpMailer->ErrorInfo,'error.log');
            throw $e;
        }
    }

    public static function SyncProperties(QEmailMessage $objMessage) {
        if ($objMessage->To) {
            $arrTo = explode(',', $objMessage->To);
            foreach ($arrTo as $strTo) {
                if (trim($strTo) != '') {
                    self::$objPhpMailer->AddAddress($strTo);
                }
            }
        }
        if ($objMessage->Cc) {
            $arrCc = explode(',', $objMessage->Cc);
            foreach ($arrCc as $strCc) {
                self::$objPhpMailer->AddCC($strCc);
            }
        }
        if ($objMessage->Bcc) {
            $arrBcc = explode(',', $objMessage->Bcc);
            foreach ($arrBcc as $strBcc) {
                self::$objPhpMailer->AddBCC($strBcc);
            }
        }


        self::$objPhpMailer->From  = $objMessage->From;
        if ($objMessage->FromName)
            self::$objPhpMailer->FromName  = $objMessage->FromName;
        else
            self::$objPhpMailer->FromName  = __EMAIL_FROM_NAME__;
        self::$objPhpMailer->Subject  = $objMessage->Subject;
        if (strlen($objMessage->HtmlBody) > 0) {
            self::$objPhpMailer->IsHTML(true);
            self::$objPhpMailer->Body = $objMessage->HtmlBody;
            if (strlen($objMessage->Body) > 0)
                self::$objPhpMailer->AltBody = $objMessage->Body;
        } elseif (strlen($objMessage->Body) > 0) {
            self::$objPhpMailer->Body = $objMessage->Body;
        } else {
            self::$objPhpMailer->Body = "-------------------------\n\r";
        }

        if (count($objMessage->HeaderArray) > 0) {
            foreach ($objMessage->HeaderArray as $strName => $strValue) {
                self::$objPhpMailer->AddCustomHeader($strName.':'.$strValue);
            }
        }

        if (count($objMessage->FileArray) > 0) {
            foreach ($objMessage->FileArray as $strFileName => $objQEmailAttachment) {
                self::$objPhpMailer->AddAttachment($objQEmailAttachment->FilePath, $objQEmailAttachment->FileName, 'base64', $objQEmailAttachment->MimeType);
            }
        }

       // if (defined('__EMAIL_SMTP_SERVER__') && __EMAIL_SMTP_SERVER__) {
            self::$objPhpMailer->Port = self::$SmtpPort;
/*            if (strpos(self::$SmtpServer, 'tls') !== false)
                self::$objPhpMailer->SMTPSecure = 'tls';
            elseif (strpos(self::$SmtpServer, 'ssl') !== false)
                self::$objPhpMailer->SMTPSecure = 'ssl';
            else
                self::$objPhpMailer->SMTPSecure = '';*/
            //self::$objPhpMailer->Host = preg_replace('/(ssl|tls)?[::\/\/]?/', '', self::$SmtpServer);
            self::$objPhpMailer->Host = self::$SmtpServer;
            if (self::$AuthLogin) {
                self::$objPhpMailer->SMTPAuth = self::$AuthLogin;
                self::$objPhpMailer->Username = self::$SmtpUsername;
                self::$objPhpMailer->Password = self::$SmtpPassword;
            }
        //}
    }

    public static function AddReplyTo($strReplyTo) {
        self::$objPhpMailer->AddReplyTo($strReplyTo);
    }

}
?>
