<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TransactionServiceDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'TransactionServiceEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'TransactionServiceBinding.php');

$app->get('/transactionservices', function () use ($app) {
	global $entityManager;
   	$transactionServiceEntities = $entityManager->getRepository("TransactionServiceEntity")->findBy(array());
    $transactionServices = bindTransactionServiceEntityArray($transactionServiceEntities);
    $transactionServices->printData($app);
});

$app->get('/transactionservices/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionServiceEntity = $entityManager->find("TransactionServiceEntity", $id);
	$transactionServiceDto = bindTransactionServiceEntity($transactionServiceEntity);
	$transactionServiceDto->printData($app);
});

$app->post('/transactionservices', function () use ($app) {
	global $entityManager;
	$transactionServiceDto = new TransactionServiceDto();
	$transactionServiceDto = $transactionServiceDto->bindXml($app);
	$transactionServiceEntity = bindTransactionServiceDto($transactionServiceDto);
	$entityManager->persist($transactionServiceEntity);
	$entityManager->flush();
	$transactionServiceDto = bindTransactionServiceEntity($transactionServiceEntity);
	$transactionServiceDto->printData($app);
});

$app->post('/transactionservices/list', function () use ($app) {
	global $entityManager;
	$transactionServiceListDto = new TransactionServiceListDto();
	$transactionServiceListDto = $transactionServiceListDto->bindXml($app);
	$transactionServicesArray = array();
	foreach ($transactionServiceListDto->getTransactionServices() as $transactionServiceDto) {
		$transactionServiceEntity = bindTransactionServiceDto($transactionServiceDto);
		$entityManager->persist($transactionServiceEntity);
		$entityManager->flush();
		array_push($transactionServicesArray,$transactionServiceEntity);
	}
	$transactionServiceListDto = new TransactionServiceListDto();
	$transactionServiceListDto->setTransactionServices($transactionServicesArray);
	$transactionServiceListDto->printData($app);
});

$app->put('/transactionservices/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionServiceEntity = $entityManager->find("TransactionServiceEntity", $id);
	$entityManager->flush();
	$transactionServiceDto = bindTransactionServiceEntity($transactionServiceEntity);
	$transactionServiceDto->printData($app);
});

$app->delete('/transactionservices/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionServiceEntity = $entityManager->find("TransactionServiceEntity", $id);
	$entityManager->remove($transactionServiceEntity);
	$entityManager->flush();
});

/*Referances*/

?>