<?php
// cli-config.php
require_once ('protected/common/init/config.php');
require_once ($PROJ_COMMON_ROOT.'bootstrap.php');

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
?>