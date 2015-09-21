<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TransactionProofDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'TransactionProofEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'TransactionProofBinding.php');

$app->get('/transactionproofs', function () use ($app) {
	global $entityManager;
   	$transactionProofEntities = $entityManager->getRepository("TransactionProofEntity")->findBy(array());
    $transactionProofs = bindTransactionProofEntityArray($transactionProofEntities);
    $transactionProofs->printData($app);
});

$app->get('/transactionproofs/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionProofEntity = $entityManager->find("TransactionProofEntity", $id);
	$transactionProofDto = bindTransactionProofEntity($transactionProofEntity);
	$transactionProofDto->printData($app);
});

$app->post('/transactionproofs', function () use ($app) {
	global $entityManager;
	$transactionProofDto = new TransactionProofDto();
	$transactionProofDto = $transactionProofDto->bindXml($app);
	$transactionProofEntity = bindTransactionProofDto($transactionProofDto);
	$entityManager->persist($transactionProofEntity);
	$entityManager->flush();
	$transactionProofDto = bindTransactionProofEntity($transactionProofEntity);
	$transactionProofDto->printData($app);
});

$app->post('/transactionproofs/list', function () use ($app) {
	global $entityManager;
	$transactionProofListDto = new TransactionProofListDto();
	$transactionProofListDto = $transactionProofListDto->bindXml($app);
	$transactionProofsArray = array();
	foreach ($transactionProofListDto->getTransactionProofs() as $transactionProofDto) {
		$transactionProofEntity = bindTransactionProofDto($transactionProofDto);
		$entityManager->persist($transactionProofEntity);
		$entityManager->flush();
		array_push($transactionProofsArray,bindTransactionProofEntity($transactionProofEntity));
	}
	$transactionProofListDto = new TransactionProofListDto();
	$transactionProofListDto->setTransactionProofs($transactionProofsArray);
	$transactionProofListDto->printData($app);
});

$app->put('/transactionproofs/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionProofEntity = $entityManager->find("TransactionProofEntity", $id);
	$entityManager->flush();
	$transactionProofDto = bindTransactionProofEntity($transactionProofEntity);
	$transactionProofDto->printData($app);
});

$app->delete('/transactionproofs/:id', function ($id) use ($app) {
	global $entityManager;
	$transactionProofEntity = $entityManager->find("TransactionProofEntity", $id);
	$entityManager->remove($transactionProofEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/transactionproofs/:id/transactions', function ($id) use ($app) {
	global $entityManager;
   	$transactionEntities = $entityManager->getRepository("TransactionEntity")->findBy(array('transactionproof'=>$id));
    $transaction = bindTransactionEntityArray($transactionEntities);
    $transaction->printData($app);
});

?>