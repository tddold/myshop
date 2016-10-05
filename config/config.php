<?php

// Constants for access controllers
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

// Templates
$template = 'default';
$templateAdmin = 'admin';


define('TemplatePrefix', "../views/{$template}/");
define('TemplateAdminPrefix', "../views/{$templateAdmin}/");
define('TemplatePostfix', '.tpl');

define('TemplateWebPath', "../../templates/{$template}/");
define('TemplateAdminWebPath', "../../templates/{$templateAdmin}/");

// Initialize Smarty
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
