<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'ServiceDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'ServiceEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'ServiceBinding.php');

$app->get('/services', function () use ($app) {
	global $entityManager;
   	$serviceEntities = $entityManager->getRepository("ServiceEntity")->findBy(array());
    $services = bindServiceEntityArray($serviceEntities);
    $services->printData($app);
});

$app->get('/services/:id', function ($id) use ($app) {
	global $entityManager;
	$serviceEntity = new ServiceEntity();
	$serviceEntity = $entityManager->find("ServiceEntity", $id);
	$serviceDto = bindServiceEntity($serviceEntity);
	$serviceDto->printData($app);
});

$app->post('/services/list', function () use ($app) {
	global $entityManager;
	$serviceListDto = new ServiceListDto();
	$serviceListDto = $serviceListDto->bindXml($app);
	foreach ($serviceListDto->getServices() as $serviceDto) {
		$serviceEntity = bindServiceDto($serviceDto);
		$entityManager->persist($serviceEntity);
		$entityManager->flush();
	}
});

$app->put('/services/:id', function ($id) use ($app) {
	global $entityManager;
	$serviceEntity = $entityManager->find("ServiceEntity", $id);
	$entityManager->flush();
	$serviceDto = bindServiceEntity($serviceEntity);
	$serviceDto->printData($app);
});

$app->post('/services', function () use ($app) {
	global $entityManager;
	$serviceDto = new ServiceDto();
	$serviceDto->bindJson($app);
	$entityManager->persist($serviceEntity);
	$entityManager->flush();
	$serviceDto = bindServiceEntity($serviceEntity);
	$serviceDto->printData($app);
});

$app->delete('/services/:id', function ($id) use ($app) {
	global $entityManager;
	$serviceEntity = $entityManager->find("ServiceEntity", $id);
	$entityManager->remove($serviceEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/services/:id/transactionservices', function ($id) use ($app) {
	global $entityManager;
   	$transactionServiceEntities = $entityManager->getRepository("TransactionServiceEntity")->findBy(array('service'=>$id));
    $transactionService = bindTransactionServiceEntityArray($transactionServiceEntities);
    $transactionService->printData($app);
});

$app->get('/services/:id/sessionservices', function ($id) use ($app) {
	global $entityManager;
   	$sessionServiceEntities = $entityManager->getRepository("SessionServiceEntity")->findBy(array('service'=>$id));
    $sessionService = bindSessionServiceEntityArray($sessionServiceEntities);
    $sessionService->printData($app);
});

?>