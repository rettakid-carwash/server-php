<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'UserEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'UserBinding.php');

$app->get('/users', function () use ($app) {
	global $entityManager;
   	$userEntities = $entityManager->getRepository("UserEntity")->findBy(array());
    $users = bindUserEntityArray($userEntities);
    $users->printData($app);
});

$app->get('/users/:id', function ($id) use ($app) {
	global $entityManager;
	$userEntity = $entityManager->find("UserEntity", $id);
	$userDto = bindUserEntity($userEntity);
	$userDto->printData($app);
});

$app->post('/users', function () use ($app) {
	global $entityManager;
	$userDto = new UserDto();
	$userDto = $userDto->bindXml($app);
	$userEntity = bindUserDto($userDto);
	$entityManager->persist($userEntity);
	$entityManager->flush();
	$userDto = bindUserEntity($userEntity);
	$userDto->printData($app);
});

$app->post('/users/list', function () use ($app) {
	global $entityManager;
	$userListDto = new UserListDto();
	$userListDto = $userListDto->bindXml($app);
	$usersArray = array();
	foreach ($userListDto->getUsers() as $userDto) {
		$userEntity = bindUserDto($userDto);
		$entityManager->persist($userEntity);
		$entityManager->flush();
		array_push($usersArray,$userEntity);
	}
	$userListDto = new UserListDto();
	$userListDto->setUsers($usersArray);
	$userListDto->printData($app);
});

$app->put('/users/:id', function ($id) use ($app) {
	global $entityManager;
	$userEntity = $entityManager->find("UserEntity", $id);
	$entityManager->flush();
	$userDto = bindUserEntity($userEntity);
	$userDto->printData($app);
});

$app->delete('/users/:id', function ($id) use ($app) {
	global $entityManager;
	$userEntity = $entityManager->find("UserEntity", $id);
	$entityManager->remove($userEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/users/:id/userdevicess', function ($id) use ($app) {
	global $entityManager;
   	$userDevicesEntities = $entityManager->getRepository("UserDevicesEntity")->findBy(array('user'=>$id));
    $userDevices = bindUserDevicesEntityArray($userDevicesEntities);
    $userDevices->printData($app);
});

$app->get('/users/:id/usercars', function ($id) use ($app) {
	global $entityManager;
   	$userCarEntities = $entityManager->getRepository("UserCarEntity")->findBy(array('user'=>$id));
    $userCar = bindUserCarEntityArray($userCarEntities);
    $userCar->printData($app);
});

$app->get('/users/:id/transactions', function ($id) use ($app) {
	global $entityManager;
   	$transactionEntities = $entityManager->getRepository("TransactionEntity")->findBy(array('user'=>$id));
    $transaction = bindTransactionEntityArray($transactionEntities);
    $transaction->printData($app);
});

$app->get('/users/:id/sessions', function ($id) use ($app) {
	global $entityManager;
   	$sessionEntities = $entityManager->getRepository("SessionEntity")->findBy(array('user'=>$id));
    $session = bindSessionEntityArray($sessionEntities);
    $session->printData($app);
});

?>