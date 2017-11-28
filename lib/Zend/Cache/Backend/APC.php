<?php

// THIS FRONTEND STILL NEED TESTS
// IT IS "ALPHA" STUFF

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
 * @subpackage Backend
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

 
/**
 * Zend_Cache_Backend_Interface
 */
require_once 'Zend/Cache/Backend/Interface.php';


/**
 * @package    Zend_Cache
 * @subpackage Backend
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Cache_Backend_APC implements Zend_Cache_Backend_Interface 
{
    
    // ------------------
    // --- Properties ---
    // ------------------
    
    /**
     * Frontend or Core directives
     * 
     * =====> (int) lifeTime :
     * - Cache lifetime (in seconds)
     * - If null, the cache is valid forever
     * 
     * =====> (int) logging :
     * - if set to true, a logging is activated throw Zend_Log
     * 
     * @var array directives
     */
    private $_directives = array(
        'lifeTime' => 3600,
        'logging' => false
    );    
     
    
    // ----------------------
    // --- Public methods ---
    // ----------------------
    
    /**
     * Constructor
     * 
     * @param array $options associative array of options
     */
    public function __construct($options = array())
    {      
        if (!extension_loaded('apc')) {
            Zend_Cache::throwException('The apc extension must be loaded for using this backend !');
        }
        if (!is_array($options)) Zend_Cache::throwException('Options parameter must be an array');
        while (list($name, $value) = each($options)) {
            $this->setOption($name, $value);
        }
    }  
        
    /**
     * Set the frontend directives
     * 
     * @param array $directives assoc of directives
     */
    public function setDirectives($directives)
    {
        if (!is_array($directives)) Zend_Cache::throwException('Directives parameter must be an array');
        while (list($name, $value) = each($directives)) {
            if (!is_string($name)) {
                Zend_Cache::throwException("Incorrect option name : $name");
            }
            if (array_key_exists($name, $this->_directives)) {
                $this->_directives[$name] = $value;
            }
        }
    } 
    
    /**
     * Set an option
     * 
     * @param string $name
     * @param mixed $value
     */ 
    public function setOption($name, $value)
    {
        if (!is_string($name) || !array_key_exists($name, $this->_options)) {
            Zend_Cache::throwException("Incorrect option name : $name");
        }
        $this->_options[$name] = $value;
    }
       
    /**
     * Test if a cache is available for the given id and (if yes) return it (false else)
     * 
     * @param string $id cache id
     * @param boolean $doNotTestCacheValidity if set to true, the cache validity won't be tested
     * @return string cached datas (or false)
     */
    public function get($id, $doNotTestCacheValidity = false) 
    {
        return apc_fetch($id);
        // WARNING : $doNotTestCacheValidity is not supported !!!
        if ($doNotTestCacheValidity) {
	        if ($this->_directives['logging']) {
                Zend_Log::log("Zend_Cache_Backend_Memcached::get() : \$doNotTestCacheValidity=true is unsupported by the Memcached backend", Zend_Log::LEVEL_WARNING);
	        }
        }
    }
    
    /**
     * Test if a cache is available or not (for the given id)
     * 
     * @param string $id cache id
     * @return mixed false (a cache is not available) or "last modified" timestamp (int) of the available cache record
     */
    public function test($id)
    {
        $result = $apc_fetch($id);
        if ($result) {
            return true;
        }
        return false;
    }
    
    /**
     * Save some string datas into a cache record
     *
     * Note : $data is always "string" (serialization is done by the 
     * core not by the backend)
     *
     * @param string $data datas to cache
     * @param string $id cache id
     * @param array $tags array of strings, the cache record will be tagged by each string entry
     * @return boolean true if no problem
     */
    public function save($data, $id, $tags = array())
    {
        $result = apc_store($id, $data, $this->_directives['lifeTime']);
        if (count($tags) > 0) {
            if ($this->_directives['logging']) {
                Zend_Log::log("Zend_Cache_Backend_Memcached::save() : tags are unsupported by the Memcached backend", Zend_Log::LEVEL_WARNING);
            }
        }
        return $result;       
    }
    
    /**
     * Remove a cache record
     * 
     * @param string $id cache id
     * @return boolean true if no problem
     */
    public function remove($id) 
    {
        return apc_delete($id);
    }
    
    /**
     * Clean some cache records
     *
     * Available modes are :
     * 'all' (default)  => remove all cache entries ($tags is not used)
     * 'old'            => remove too old cache entries ($tags is not used) 
     * 'matchingTag'    => remove cache entries matching all given tags 
     *                     ($tags can be an array of strings or a single string) 
     * 'notMatchingTag' => remove cache entries not matching one of the given tags
     *                     ($tags can be an array of strings or a single string)    
     * 
     * @param string $mode clean mode
     * @param tags array $tags array of tags
     * @return boolean true if no problem
     */
    public function clean($mode = 'all', $tags = array()) 
    {
        if ($mode==Zend_Cache::CLEANING_MODE_ALL) {
            return apc_clear_cache('user');
        }
        if ($mode==Zend_Cache::CLEANING_MODE_OLD) {
            if ($this->_directives['logging']) {
                Zend_Log::log("Zend_Cache_Backend_Memcached::clean() : CLEANING_MODE_OLD is unsupported by the Memcached backend", Zend_Log::LEVEL_WARNING);
            }
        }
        if ($mode==Zend_Cache::CLEANING_MODE_MATCHING_TAG) {
            if ($this->_directives['logging']) {
                Zend_Log::log("Zend_Cache_Backend_Memcached::clean() : tags are unsupported by the Memcached backend", Zend_Log::LEVEL_WARNING);
            }
        }
        if ($mode==Zend_Cache::CLEANING_MODE_NOT_MATCHING_TAG) {
            if ($this->_directives['logging']) {
                Zend_Log::log("Zend_Cache_Backend_Memcached::clean() : tags are unsupported by the Memcached backend", Zend_Log::LEVEL_WARNING);
            }
        }
    }
        
}
