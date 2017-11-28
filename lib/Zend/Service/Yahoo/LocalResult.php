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
 * @category   Zend
 * @package    Zend_Service
 * @subpackage Yahoo
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */


/**
 * @todo coding standards: naming of instance variables
 * @category   Zend
 * @package    Zend_Service
 * @subpackage Yahoo
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Service_Yahoo_LocalResult extends Zend_Service_Yahoo_Result {
    /**
     * @var string $Address Street address of the result
     */
    public $Address;
    
    /**
     * @var string $City City in which the result resides
     */
    public $City;
    
    /**
     * @var string $State State in which the result resides
     */
    public $State;
    
    /**
     * @var string $Phone Phone number for the result
     */
    public $Phone;
    
    /**
     * @var int $Rating User-submitted rating for the result
     */
    public $Rating;
    
    /**
     * @var float $Distance The distance to the result from your specified location
     */
    public $Distance;
    
    /**
     * @var string $MapUrl A URL of a map for the result.
     */
    public $MapUrl;
    
    /**
     * @var string $BusinessUrl The URL for the business website, if known
     */
    public $BusinessUrl;
    
    /**
     * @var string $BusinessClickUrl The URL for linking to the business website, if known
     */
    public $BusinessClickUrl;
    
    
    /**
     * @todo docblock
     */
    protected $_namespace = "urn:yahoo:lcl";

    
    /**
     * @todo docblock
     */
    public function __construct(DomElement $result) {
        $this->_fields = array('Address','City', 'City', 'State', 'Phone','Rating','Distance','MapUrl',
                            'BusinessUrl', 'BusinessClickUrl');
        parent::__construct($result);
    }
}
