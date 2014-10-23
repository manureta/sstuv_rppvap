<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyZipArchiveclass
 *
 * @author www-data
 */

if (!extension_loaded("zip")) {dl("php_zip.".PHP_SHLIB_SUFFIX);}

class MyZipArchive extends ZipArchive
{
	const FILE_LIMIT = 250;
	protected $intCount = 0;
	protected $strPath;

	public function open($strPath, $intConstant =null){
		$this->strPath = $strPath;
		return parent::open($strPath, $intConstant);
	}



    /**
     *
     * Adds a directory recursively.
     *
     * @param string $filename The path to the file to add.
     *
     * @param string $localname Local name inside ZIP archive.
     *
     */
    public function addDir($filename, $localname, $excludeMatch  =null)
    {
        $this->addEmptyDir($localname);
        $iter = new RecursiveDirectoryIterator($filename);

        foreach ($iter as $fileinfo) {
            if ( (!$fileinfo->isFile() && !$fileinfo->isDir()) || ($excludeMatch && (!is_array($excludeMatch)) && (preg_match($excludeMatch,$fileinfo->getPathname())))) {
                continue;
            }
            if (is_array($excludeMatch)) {
                $skip=false;
                foreach ($excludeMatch as $regex) {
                    if(preg_match($regex,$fileinfo->getPathname()))
                            $skip=true;
                }
                if($skip)
                    continue;
            }

            $this->intCount++;
            if($this->intCount > self::FILE_LIMIT){
                    $this->intCount=0;
                    $this->close();
                    $this->open($this->strPath);
            }
            $method = $fileinfo->isFile() ? 'addFile' : 'addDir';
			//LogHelper::Log($fileinfo->getFilename());
            $this->$method($fileinfo->getPathname(), $localname . '/' .
                $fileinfo->getFilename());

        }
    }
}
?>
