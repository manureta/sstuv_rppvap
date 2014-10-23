<?php
class CurlSoapClient extends SoapClient {
    protected $DownloadedWsdlFile = false; 

    public function __construct($wsdl, $options = array()) {
        $this->proxy_login = (!array_key_exists('proxy_login', $options) ? false : $options['proxy_login']);
        $this->proxy_password = (!array_key_exists('proxy_password', $options) ? false : $options['proxy_password']);
        $this->proxy_host = (!array_key_exists('proxy_host', $options) ? false : $options['proxy_host']);
        $this->proxy_port = (!array_key_exists('proxy_port', $options) ? false : $options['proxy_port']);
        $data = $this->callCurl($wsdl);
        $this->DownloadedWsdlFile = __TMP_DIR__.'/'.md5($data).'.wsdl';
        file_put_contents($this->DownloadedWsdlFile, $data);
        parent::__construct($this->DownloadedWsdlFile, $options);
        unlink($this->DownloadedWsdlFile);
    }

    /**
     * Call a url using curl with ntlm auth
     *
     * @param string $url
     * @param string $data
     * @return string
     * @throws SoapFault on curl connection error
     */
    protected function callCurl($url, $data = null) {
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_HEADER, false);
        curl_setopt($handle, CURLOPT_URL, $url);
        //curl_setopt($handle, CURLOPT_FAILONERROR, true);
        //curl_setopt($handle, CURLOPT_HTTPHEADER, Array("PHP SOAP-NTLM Client") );
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_HTTPHEADER, array("Expect:")); // evito que ponga el header Expect:100-continue
        if($data)
            curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
        if($this->proxy_login)
            curl_setopt($handle, CURLOPT_PROXYUSERPWD, $this->proxy_login.(($this->proxy_password) ? ':'.$this->proxy_password : ''));
        if ($this->proxy_host)
            curl_setopt($handle, CURLOPT_PROXY, $this->proxy_host);
        if ($this->proxy_port)
            curl_setopt($handle, CURLOPT_PROXYPORT, $this->proxy_port);
        //curl_setopt($handle, CURLOPT_PROXYAUTH, CURLAUTH_NTLM);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($handle);
        //if ($response === false) {
        //    throw new Exception('CURL error: '.curl_error($handle).'('.curl_errno($handle).')');
        //}
        curl_close($handle);
        return $response;
    }

    public function __doRequest($request,$location,$action,$version,$one_way = 0) {
        return $this->callCurl($location,$request);
    }

}
?>
