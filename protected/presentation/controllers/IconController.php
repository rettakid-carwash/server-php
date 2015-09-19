<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'IconDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'IconEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'IconBinding.php');

$app->get('/icons', function () use ($app) {
	global $entityManager;
   	$iconEntities = $entityManager->getRepository("IconEntity")->findBy(array());
    $icons = bindIconEntityArray($iconEntities);
    $icons->printData($app);
});

$app->get('/icons/:id', function ($id) use ($app) {
	global $entityManager;
	$iconEntity = new IconEntity();
	$iconEntity = $entityManager->find("IconEntity", $id);
	$iconDto = bindIconEntity($iconEntity);
	$iconDto->printData($app);
});

$app->post('/icons/list', function () use ($app) {
	global $entityManager;
	$returnIconListDto = new IconListDto();
	$iconListDto = new IconListDto();
	$iconListDto = $iconListDto->bindXml($app);
	$iconsArray = array();
	foreach ($iconListDto->getIcons() as $iconDto) {
		$iconEntity = bindIconDto($iconDto);
		$entityManager->persist($iconEntity);
		$entityManager->flush();
		array_push($iconsArray,$iconEntity);
	}
	$iconListDto = new IconListDto();
	$iconListDto.setIcons($iconsArray)
	$iconListDto.printXml();
});

$app->put('/icons/:id', function ($id) use ($app) {
	global $entityManager;
	$iconEntity = $entityManager->find("IconEntity", $id);
	$entityManager->flush();
	$iconDto = bindIconEntity($iconEntity);
	$iconDto->printData($app);
});

$app->post('/icons', function () use ($app) {
	global $entityManager;
	$iconDto = new IconDto();
	$iconDto->bindJson($app);
	$entityManager->persist($iconEntity);
	$entityManager->flush();
	$iconDto = bindIconEntity($iconEntity);
	$iconDto->printData($app);
});

$app->delete('/icons/:id', function ($id) use ($app) {
	global $entityManager;
	$iconEntity = $entityManager->find("IconEntity", $id);
	$entityManager->remove($iconEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/icons/:id/services', function ($id) use ($app) {
	global $entityManager;
   	$serviceEntities = $entityManager->getRepository("ServiceEntity")->findBy(array('icon'=>$id));
    $service = bindServiceEntityArray($serviceEntities);
    $service->printData($app);
});

?>