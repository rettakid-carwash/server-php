<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DataContentDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'DataContentEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'DataContentBinding.php');

$app->get('/datacontents', function () use ($app) {
	global $entityManager;
   	$dataContentEntities = $entityManager->getRepository("DataContentEntity")->findBy(array());
    $dataContents = bindDataContentEntityArray($dataContentEntities);
    $dataContents->printData($app);
});

$app->get('/datacontents/:id', function ($id) use ($app) {
	global $entityManager;
	$dataContentEntity = new DataContentEntity();
	$dataContentEntity = $entityManager->find("DataContentEntity", $id);
	$dataContentDto = bindDataContentEntity($dataContentEntity);
	$dataContentDto->printData($app);
});

$app->post('/datacontents/list', function () use ($app) {
	global $entityManager;
	$dataContentListDto = new DataContentListDto();
	$dataContentListDto = $dataContentListDto->bindXml($app);
	foreach ($dataContentListDto->getDataContents() as $dataContentDto) {
		$dataContentEntity = bindDataContentDto($dataContentDto);
		$entityManager->persist($dataContentEntity);
		$entityManager->flush();
	}
});

$app->put('/datacontents/:id', function ($id) use ($app) {
	global $entityManager;
	$dataContentEntity = $entityManager->find("DataContentEntity", $id);
	$entityManager->flush();
	$dataContentDto = bindDataContentEntity($dataContentEntity);
	$dataContentDto->printData($app);
});

$app->post('/datacontents', function () use ($app) {
	global $entityManager;
	$dataContentDto = new DataContentDto();
	$dataContentDto->bindJson($app);
	$entityManager->persist($dataContentEntity);
	$entityManager->flush();
	$dataContentDto = bindDataContentEntity($dataContentEntity);
	$dataContentDto->printData($app);
});

$app->delete('/datacontents/:id', function ($id) use ($app) {
	global $entityManager;
	$dataContentEntity = $entityManager->find("DataContentEntity", $id);
	$entityManager->remove($dataContentEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/datacontents/:id/newss', function ($id) use ($app) {
	global $entityManager;
   	$newsEntities = $entityManager->getRepository("NewsEntity")->findBy(array('datacontent'=>$id));
    $news = bindNewsEntityArray($newsEntities);
    $news->printData($app);
});

?>