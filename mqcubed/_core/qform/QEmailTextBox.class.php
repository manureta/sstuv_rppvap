<?php
/**
 * QEmailTextBox
 *
 * @uses QTextBox
 * @package application
 * @subpackage controls
 * @version
 * @copyright 2008 Lima Bean
 * @author Adam Jorgensen <adam@limabean.co.za>
 * @license Closed Source
 */
class QEmailTextBox extends QTextBox
{
    /**
     * Validate
     *
     * This method is overriden in order to validate the
     * Email address entered into the field.
     *
     * @access public
     * @return boolean
     */
    public function Validate()
    {
        if(parent::Validate())
        {
            if(strlen(trim($this->Text)) == 0 && !$this->Required) return true;
            foreach(explode(';', $this->Text) as $strEmailAddress)
            {
                if(!$this->ValidateEmailAddress($strEmailAddress))
                {
                    $this->strValidationError = "Dirección de correo inválida";
                    return false;
                }
            }
        }
        else return false;

        $this->strValidationError = "";
        return true;
    }

    /**
     * Validate an email address.
     * Provide email address (raw input)
     * Returns true if the email address has the email
     * address format and the domain exists.
     *
     * The body of this function is adapted from the Linux Journal
     * article "Validate an E-Mail Address with PHP, the Right Way"
     * which can be found at http://www.linuxjournal.com/article/9585
     *
     * This article was used as it validates email addresses
     * accoding to the IETF document RFC 3696 spec, rather than
     * someones idea of a suitable RegEx.
     *
     * @access protected
     * @param string $strEmailAddress An email address to validate
     * @return boolean
    */
    protected function ValidateEmailAddress($strEmailAddress)
    {
        return filter_var($strEmailAddress, FILTER_VALIDATE_EMAIL);
    }
}
?>