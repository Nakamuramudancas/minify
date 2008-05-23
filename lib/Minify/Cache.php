<?php

require_once 'Cache/Lite/File.php';

class Minify_Cache extends Cache_Lite_File
{
	/**
    * Constructor
    *
    * $options is an assoc. To have a look at availables options,
    * see the constructor of the Cache_Lite class in 'Cache_Lite.php'
    *
    * Comparing to Cache_Lite constructor, there are two more options:
    * $options = array(
    *     (...) see Cache_Lite constructor
    *     'masterFile' => complete path of the file used for controlling the cache lifetime(string)
    *     'masterTime' => timestamp of last application change that would invalidate the cache(int).
    * );
    * Supply only one of these. If 'masterFile' is supplied, 'masterTime' is
    * ignored, otherwise 'masterTime' is required.
    *
    * @param array $options options
    * @access public
    */
    function Minify_Cache($options = array(NULL))
    {   
        $options['lifetime'] = 0;
        $this->Cache_Lite($options);
        if (isset($options['masterFile'])) {
            $this->_masterFile = $options['masterFile'];
            if (!($this->_masterFile_mtime = @filemtime($this->_masterFile))) {
                return $this->raiseError('Cache_Lite_File : Unable to read masterFile : '.$this->_masterFile, -3);
            }
        } elseif (isset($options['masterTime'])) {
            $this->_masterFile_mtime = $options['masterTime'];
        } else {
            return $this->raiseError('Cache_Lite_File : either masterFile or masterTime option must be set !');
        }
    }
}
