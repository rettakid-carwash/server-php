<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'SessionServiceDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'SessionServiceEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'SessionServiceBinding.php');

$app->get('/sessionservices', function () use ($app) {
	global $entityManager;
   	$sessionServiceEntities = $entityManager->getRepository("SessionServiceEntity")->findBy(array());
    $sessionServices = bindSessionServiceEntityArray($sessionServiceEntities);
    $sessionServices->printData($app);
});

$app->get('/sessionservices/:id', function ($id) use ($app) {
	global $entityManager;
	$sessionServiceEntity = new SessionServiceEntity();
	$sessionServiceEntity = $entityManager->find("SessionServiceEntity", $id);
	$sessionServiceDto = bindSessionServiceEntity($sessionServiceEntity);
	$sessionServiceDto->printData($app);
});

$app->post('/sessionservices/list', function () use ($app) {
	global $entityManager;
	$sessionServiceListDto = new SessionServiceListDto();
	$sessionServiceListDto = $sessionServiceListDto->bindXml($app);
	foreach ($sessionServiceListDto->getSessionServices() as $sessionServiceDto) {
		$sessionServiceEntity = bindSessionServiceDto($sessionServiceDto);
		$entityManager->persist($sessionServiceEntity);
		$entityManager->flush();
	}
});

$app->put('/sessionservices/:id', function ($id) use ($app) {
	global $entityManager;
	$sessionServiceEntity = $entityManager->find("SessionServiceEntity", $id);
	$entityManager->flush();
	$sessionServiceDto = bindSessionServiceEntity($sessionServiceEntity);
	$sessionServiceDto->printData($app);
});

$app->post('/sessionservices', function () use ($app) {
	global $entityManager;
	$sessionServiceDto = new SessionServiceDto();
	$sessionServiceDto->bindJson($app);
	$entityManager->persist($sessionServiceEntity);
	$entityManager->flush();
	$sessionServiceDto = bindSessionServiceEntity($sessionServiceEntity);
	$sessionServiceDto->printData($app);
});

$app->delete('/sessionservices/:id', function ($id) use ($app) {
	global $entityManager;
	$sessionServiceEntity = $entityManager->find("SessionServiceEntity", $id);
	$entityManager->remove($sessionServiceEntity);
	$entityManager->flush();
});

/*Referances*/

?>