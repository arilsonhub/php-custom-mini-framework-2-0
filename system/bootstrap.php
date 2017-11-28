<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
require 'config.php';
require 'Doctrine-1.2.3/Doctrine.php';

spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Doctrine_Core', 'modelsAutoload'));

$manager = Doctrine_Manager::getInstance();

try {
  // Insira aqui os dados de sua conexão
  $conn = Doctrine_Manager::connection(SGBD."://".DB_USER.":".DB_PASS."@".DB_HOST."/".DB_NAME);

  $manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING,
Doctrine_Core::MODEL_LOADING_CONSERVATIVE);
  $manager->setAttribute(Doctrine_Core::ATTR_EXPORT, Doctrine_Core::EXPORT_ALL);

  $profiler = new Doctrine_Connection_Profiler();
  $manager->setListener($profiler);

} catch (Doctrine_Manager_Exception $e) {
  print $e->getMessage();
}

Doctrine_Core::loadModels('../app/tables');
*/
?>