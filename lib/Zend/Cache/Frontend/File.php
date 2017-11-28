<?php

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @package    Zend_Cache
 * @subpackage Frontend
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
 
 
/**
 * Zend_Cache_Core
 */
require_once 'Zend/Cache/Core.php';


/**
 * @package    Zend_Cache
 * @subpackage Frontend
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Cache_Frontend_File extends Zend_Cache_Core
{
       
    /**
     * Available options
     * 
     * ====> (string) masterFile :
     * - the complete path and name of the master file 
     * - this option has to be set ! 
     * 
     * @var array available options
     */
    protected $_specificOptions = array(
    	'masterFile' => ''
    ); 
    
    /**
     * Master file mtime
     * 
     * @var int
     */
    private $_masterFile_mtime = null;
          
    /**
     * Constructor
     * 
     * @param array $options associative array of options
     */
    public function __construct($options = array())
    {
        if (!isset($options['masterFile'])) {
            Zend_Cache::throwException('masterFile option must be set');
        }
        while (list($name, $value) = each($options)) {
            $this->setOption($name, $value);
        }
        clearstatcache();
        if (!($this->_masterFile_mtime = @filemtime($options['masterFile']))) {
            Zend_Cache::throwException('Unable to read masterFile : '.$this->_specificOptions['masterFile']);
        }
    }    
       
    /**
     * Test if a cache is available for the given id and (if yes) return it (false else)
     * 
     * @param string $id cache id
     * @param boolean $doNotTestCacheValidity if set to true, the cache validity won't be tested
     * @param boolean $doNotUnserialize do not serialize (even if automaticSerialization is true) => for internal use
     * @return mixed cached datas (or false)
     */
    public function get($id, $doNotTestCacheValidity = false, $doNotUnserialize = false)
    {
        if (!$doNotTestCacheValidity) {
            if ($this->test($id)) {
                return parent::get($id, true, $doNotUnserialize);
            }
            return false;
        }
        return parent::get($id, true, $doNotUnserialize);
    }
   
    /**
     * Test if a cache is available for the given id 
     *
     * @param string $id cache id
     * @return boolean true is a cache is available, false else
     */     
    public function test($id) 
    {
        $lastModified = parent::test($id);
        if ($lastModified) {
            if ($lastModified > $this->_masterFile_mtime) {
                return $lastModified;
            }
        }
        return false;
    }
                 
}

