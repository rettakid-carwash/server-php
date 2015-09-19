<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserCarDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'UserCarEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'UserCarBinding.php');

$app->get('/usercars', function () use ($app) {
	global $entityManager;
   	$userCarEntities = $entityManager->getRepository("UserCarEntity")->findBy(array());
    $userCars = bindUserCarEntityArray($userCarEntities);
    $userCars->printData($app);
});

$app->get('/usercars/:id', function ($id) use ($app) {
	global $entityManager;
	$userCarEntity = new UserCarEntity();
	$userCarEntity = $entityManager->find("UserCarEntity", $id);
	$userCarDto = bindUserCarEntity($userCarEntity);
	$userCarDto->printData($app);
});

$app->post('/usercars/list', function () use ($app) {
	global $entityManager;
	$userCarListDto = new UserCarListDto();
	$userCarListDto = $userCarListDto->bindXml($app);
	foreach ($userCarListDto->getUserCars() as $userCarDto) {
		$userCarEntity = bindUserCarDto($userCarDto);
		$entityManager->persist($userCarEntity);
		$entityManager->flush();
	}
});

$app->put('/usercars/:id', function ($id) use ($app) {
	global $entityManager;
	$userCarEntity = $entityManager->find("UserCarEntity", $id);
	$entityManager->flush();
	$userCarDto = bindUserCarEntity($userCarEntity);
	$userCarDto->printData($app);
});

$app->post('/usercars', function () use ($app) {
	global $entityManager;
	$userCarDto = new UserCarDto();
	$userCarDto->bindJson($app);
	$entityManager->persist($userCarEntity);
	$entityManager->flush();
	$userCarDto = bindUserCarEntity($userCarEntity);
	$userCarDto->printData($app);
});

$app->delete('/usercars/:id', function ($id) use ($app) {
	global $entityManager;
	$userCarEntity = $entityManager->find("UserCarEntity", $id);
	$entityManager->remove($userCarEntity);
	$entityManager->flush();
});

/*Referances*/

?>