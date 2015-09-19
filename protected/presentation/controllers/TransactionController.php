<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TransactionDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'TransactionEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'TransactionBinding.php');

$app->get('/transactions', function () use ($app) {
	global $entityManager;
   	$transactionEntities = $entityManager->getRepository("TransactionEntity")->findBy(array());
    $transactions = bindTransactionEntityArray($transactionEntities);
    $transactions->printData($app);
});

$app->get('/transactions/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionEntity = new TransactionEntity();
	$transactionEntity = $entityManager->find("TransactionEntity", $id);
	$transactionDto = bindTransactionEntity($transactionEntity);
	$transactionDto->printData($app);
});

$app->post('/transactions/list', function () use ($app) {
	global $entityManager;
	$transactionListDto = new TransactionListDto();
	$transactionListDto = $transactionListDto->bindXml($app);
	foreach ($transactionListDto->getTransactions() as $transactionDto) {
		$transactionEntity = bindTransactionDto($transactionDto);
		$entityManager->persist($transactionEntity);
		$entityManager->flush();
	}
});

$app->put('/transactions/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionEntity = $entityManager->find("TransactionEntity", $id);
	$entityManager->flush();
	$transactionDto = bindTransactionEntity($transactionEntity);
	$transactionDto->printData($app);
});

$app->post('/transactions', function () use ($app) {
	global $entityManager;
	$transactionDto = new TransactionDto();
	$transactionDto->bindJson($app);
	$entityManager->persist($transactionEntity);
	$entityManager->flush();
	$transactionDto = bindTransactionEntity($transactionEntity);
	$transactionDto->printData($app);
});

$app->delete('/transactions/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionEntity = $entityManager->find("TransactionEntity", $id);
	$entityManager->remove($transactionEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/transactions/:id/transactionservices', function ($id) use ($app) {
	global $entityManager;
   	$transactionServiceEntities = $entityManager->getRepository("TransactionServiceEntity")->findBy(array('transaction'=>$id));
    $transactionService = bindTransactionServiceEntityArray($transactionServiceEntities);
    $transactionService->printData($app);
});

?>