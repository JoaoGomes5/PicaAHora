<?php
//TIMEZONE E LOCALE
date_default_timezone_set('Europe/Lisbon');
setlocale(LC_TIME, 'pt', 'pt.utf-8', 'portuguese');


///Pastas ->CONSTANTES

define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));

//ARQUIVOS
require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(MODEL_PATH . '/Model.php'));
require_once(realpath(EXCEPTION_PATH . '/AppException.php'));
 require_once(realpath(EXCEPTION_PATH . '/ValidacionException.php'));