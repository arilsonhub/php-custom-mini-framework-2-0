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
 * @package    Zend_Mail
 * @subpackage Transport
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */


/**
 * Zend_Mail_Transport_Abstract
 */
require_once 'Zend/Mail/Transport/Abstract.php';


/**
 * Class for sending eMails via the PHP internal mail() function
 *
 * @category   Zend
 * @package    Zend_Mail
 * @subpackage Transport
 * @copyright  Copyright (c) 2006 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Mail_Transport_Sendmail extends Zend_Mail_Transport_Abstract
{
    /**
     * Subject
     * @var string 
     * @access public
     */
    public $subject = null;

    /**
     * EOL for headers and MIME parts
     * @var string 
     * @access public
     */

    /**
     * EOL character string
     * @var string 
     * @access public
     */
    public $EOL = PHP_EOL;

    /**
     * Send mail using PHP native mail()
     *
     * @access public
     * @return void
     * @throws Zend_Mail_Transport_Exception on mail() failure
     */
    public function _sendMail()
    {
        if (!mail(
                $this->recipients, 
                $this->_mail->getSubject(), 
                $this->body, 
                $this->header)) 
        {
            throw new Zend_Mail_Transport_Exception('Unable to send mail');
        }
    }

    /**
     * Format and fix headers
     *
     * mail() uses its $to and $subject arguments to set the To: and Subject:
     * headers, respectively. This method strips those out as a sanity check to
     * prevent duplicate header entries.
     * 
     * @access protected
     * @param array $headers 
     * @return void
     */
    protected function _prepareHeaders($headers)
    {
        if (!$this->_mail) {
            throw new Zend_Mail_Transport_Exception('_prepareHeaders requires a registered Zend_Mail object');
        }

        // mail() uses its $to parameter to set the To: header, and the $subject
        // parameter to set the Subject: header. We need to strip them out.
        if (0 === strpos(PHP_OS, 'WIN')) {
            // If the current recipients list is empty, throw an error
            if (empty($this->recipients)) {
                throw new Zend_Mail_Transport_Exception('Missing To addresses');
            }
        } else {
            // All others, simply grab the recipients and unset the To: header
            if (!isset($headers['To'])) {
                throw new Zend_Mail_Transport_Exception('Missing To header');
            }

            unset($headers['To']['append']);
            $this->recipients = implode(',', $headers['To']);
            unset($headers['To']);
        }

        // Remove subject header, if present
        if (isset($headers['Subject'])) {
            unset($headers['Subject']);
        }

        // Prepare headers
        parent::_prepareHeaders($headers);
    }
}

