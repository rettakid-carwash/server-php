<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'NewsDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'NewsEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'NewsBinding.php');

$app->get('/newss', function () use ($app) {
	global $entityManager;
   	$newsEntities = $entityManager->getRepository("NewsEntity")->findBy(array());
    $newss = bindNewsEntityArray($newsEntities);
    $newss->printData($app);
});

$app->get('/newss/:id', function ($id) use ($app) {
	global $entityManager;
	$newsEntity = new NewsEntity();
	$newsEntity = $entityManager->find("NewsEntity", $id);
	$newsDto = bindNewsEntity($newsEntity);
	$newsDto->printData($app);
});

$app->post('/newss/list', function () use ($app) {
	global $entityManager;
	$returnNewsListDto = new NewsListDto();
	$newsListDto = new NewsListDto();
	$newsListDto = $newsListDto->bindXml($app);
	$newssArray = array();
	foreach ($newsListDto->getNewss() as $newsDto) {
		$newsEntity = bindNewsDto($newsDto);
		$entityManager->persist($newsEntity);
		$entityManager->flush();
		array_push($newssArray,$newsEntity);
	}
	$newsListDto = new NewsListDto();
	$newsListDto->setNewss($newssArray);
	$newsListDto->printData($app);
});

$app->put('/newss/:id', function ($id) use ($app) {
	global $entityManager;
	$newsEntity = $entityManager->find("NewsEntity", $id);
	$entityManager->flush();
	$newsDto = bindNewsEntity($newsEntity);
	$newsDto->printData($app);
});

$app->post('/newss', function () use ($app) {
	global $entityManager;
	$newsDto = new NewsDto();
	$newsDto->bindJson($app);
	$entityManager->persist($newsEntity);
	$entityManager->flush();
	$newsDto = bindNewsEntity($newsEntity);
	$newsDto->printData($app);
});

$app->delete('/newss/:id', function ($id) use ($app) {
	global $entityManager;
	$newsEntity = $entityManager->find("NewsEntity", $id);
	$entityManager->remove($newsEntity);
	$entityManager->flush();
});

/*Referances*/

?>