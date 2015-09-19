<?php

require_once ('protected/common/config.php');
require_once ($PROJ_FRAMEWORK_ROOT);
require_once ($PROJ_COMMON_ROOT.'bootstrap.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'UserEntity.php');

/*$user = new UserEntity();
$user->setUserName("lwazi");
$user->setUserSurname("pru");
$user->setUserEmail("lwaziprusent");
$user->setUserPassword("12345");
$user->setUserNumber("12345");
$user->setUserGender("Male");
$user->setUserAge(25);
$user->setUserAllowPush(0);

echo "email - ".$user->getUserEmail();

$entityManager->persist($user);
$entityManager->flush();

echo "Created Product with ID " . $user->getUserEmail() . "\n";*/

$userEntity = $entityManager->find("UserEntity", 1);
echo $userEntity->getUserName();