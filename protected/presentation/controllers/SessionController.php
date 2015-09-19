<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'SessionDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'SessionEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'SessionBinding.php');

$app->get('/sessions', function () use ($app) {
	global $entityManager;
   	$sessionEntities = $entityManager->getRepository("SessionEntity")->findBy(array());
    $sessions = bindSessionEntityArray($sessionEntities);
    $sessions->printData($app);
});

$app->get('/sessions/:id', function ($id) use ($app) {
	global $entityManager;
	$sessionEntity = new SessionEntity();
	$sessionEntity = $entityManager->find("SessionEntity", $id);
	$sessionDto = bindSessionEntity($sessionEntity);
	$sessionDto->printData($app);
});

$app->post('/sessions/list', function () use ($app) {
	global $entityManager;
	$returnSessionListDto = new SessionListDto();
	$sessionListDto = new SessionListDto();
	$sessionListDto = $sessionListDto->bindXml($app);
	$sessionsArray = array();
	foreach ($sessionListDto->getSessions() as $sessionDto) {
		$sessionEntity = bindSessionDto($sessionDto);
		$entityManager->persist($sessionEntity);
		$entityManager->flush();
		array_push($sessionsArray,$sessionEntity);
	}
	$sessionListDto = new SessionListDto();
	$sessionListDto.setSessions($sessionsArray)
	$sessionListDto.printData($app);
});

$app->put('/sessions/:id', function ($id) use ($app) {
	global $entityManager;
	$sessionEntity = $entityManager->find("SessionEntity", $id);
	$entityManager->flush();
	$sessionDto = bindSessionEntity($sessionEntity);
	$sessionDto->printData($app);
});

$app->post('/sessions', function () use ($app) {
	global $entityManager;
	$sessionDto = new SessionDto();
	$sessionDto->bindJson($app);
	$entityManager->persist($sessionEntity);
	$entityManager->flush();
	$sessionDto = bindSessionEntity($sessionEntity);
	$sessionDto->printData($app);
});

$app->delete('/sessions/:id', function ($id) use ($app) {
	global $entityManager;
	$sessionEntity = $entityManager->find("SessionEntity", $id);
	$entityManager->remove($sessionEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/sessions/:id/sessionservices', function ($id) use ($app) {
	global $entityManager;
   	$sessionServiceEntities = $entityManager->getRepository("SessionServiceEntity")->findBy(array('session'=>$id));
    $sessionService = bindSessionServiceEntityArray($sessionServiceEntities);
    $sessionService->printData($app);
});

?>