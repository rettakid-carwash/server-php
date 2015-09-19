<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDevicesDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'UserDevicesEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'UserDevicesBinding.php');

$app->get('/userdevicess', function () use ($app) {
	global $entityManager;
   	$userDevicesEntities = $entityManager->getRepository("UserDevicesEntity")->findBy(array());
    $userDevicess = bindUserDevicesEntityArray($userDevicesEntities);
    $userDevicess->printData($app);
});

$app->get('/userdevicess/:id', function ($id) use ($app) {
	global $entityManager;
	$userDevicesEntity = new UserDevicesEntity();
	$userDevicesEntity = $entityManager->find("UserDevicesEntity", $id);
	$userDevicesDto = bindUserDevicesEntity($userDevicesEntity);
	$userDevicesDto->printData($app);
});

$app->post('/userdevicess/list', function () use ($app) {
	global $entityManager;
	$returnUserDevicesListDto = new UserDevicesListDto();
	$userDevicesListDto = new UserDevicesListDto();
	$userDevicesListDto = $userDevicesListDto->bindXml($app);
	$userDevicessArray = array();
	foreach ($userDevicesListDto->getUserDevicess() as $userDevicesDto) {
		$userDevicesEntity = bindUserDevicesDto($userDevicesDto);
		$entityManager->persist($userDevicesEntity);
		$entityManager->flush();
		array_push($userDevicessArray,$userDevicesEntity);
	}
	$userDevicesListDto = new UserDevicesListDto();
	$userDevicesListDto->setUserDevicess($userDevicessArray);
	$userDevicesListDto->printData($app);
});

$app->put('/userdevicess/:id', function ($id) use ($app) {
	global $entityManager;
	$userDevicesEntity = $entityManager->find("UserDevicesEntity", $id);
	$entityManager->flush();
	$userDevicesDto = bindUserDevicesEntity($userDevicesEntity);
	$userDevicesDto->printData($app);
});

$app->post('/userdevicess', function () use ($app) {
	global $entityManager;
	$userDevicesDto = new UserDevicesDto();
	$userDevicesDto->bindJson($app);
	$entityManager->persist($userDevicesEntity);
	$entityManager->flush();
	$userDevicesDto = bindUserDevicesEntity($userDevicesEntity);
	$userDevicesDto->printData($app);
});

$app->delete('/userdevicess/:id', function ($id) use ($app) {
	global $entityManager;
	$userDevicesEntity = $entityManager->find("UserDevicesEntity", $id);
	$entityManager->remove($userDevicesEntity);
	$entityManager->flush();
});

/*Referances*/

?>