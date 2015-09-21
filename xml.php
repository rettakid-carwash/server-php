<?php

require_once ('protected/common/init/config.php');
require_once ($PROJ_FRAMEWORK_ROOT);
require_once ($PROJ_COMMON_ROOT.'bootstrap.php');

$app = new \Slim\Slim();

require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'UserController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'DevicesTypeController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'UserDeviceController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'UserCarController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'DataContentController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'IconController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'NewsController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'ServiceController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'TransactionProofController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'TransactionController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'TransactionServiceController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'SessionController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'SessionServiceController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'LoyaltyRewardController.php');

$app->run();

?>