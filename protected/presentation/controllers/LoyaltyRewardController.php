<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'LoyaltyRewardDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'LoyaltyRewardEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'LoyaltyRewardBinding.php');

$app->get('/loyaltyrewards', function () use ($app) {
	global $entityManager;
   	$loyaltyRewardEntities = $entityManager->getRepository("LoyaltyRewardEntity")->findBy(array());
    $loyaltyRewards = bindLoyaltyRewardEntityArray($loyaltyRewardEntities);
    $loyaltyRewards->printData($app);
});

$app->get('/loyaltyrewards/:id', function ($id) use ($app) {
	global $entityManager;
	$loyaltyRewardEntity = $entityManager->find("LoyaltyRewardEntity", $id);
	$loyaltyRewardDto = bindLoyaltyRewardEntity($loyaltyRewardEntity);
	$loyaltyRewardDto->printData($app);
});

$app->post('/loyaltyrewards', function () use ($app) {
	global $entityManager;
	$loyaltyRewardDto = new LoyaltyRewardDto();
	$loyaltyRewardDto = $loyaltyRewardDto->bindXml($app);
	$loyaltyRewardEntity = bindLoyaltyRewardDto($loyaltyRewardDto);
	$entityManager->persist($loyaltyRewardEntity);
	$entityManager->flush();
	$loyaltyRewardDto = bindLoyaltyRewardEntity($loyaltyRewardEntity);
	$loyaltyRewardDto->printData($app);
});

$app->post('/loyaltyrewards/list', function () use ($app) {
	global $entityManager;
	$loyaltyRewardListDto = new LoyaltyRewardListDto();
	$loyaltyRewardListDto = $loyaltyRewardListDto->bindXml($app);
	$loyaltyRewardsArray = array();
	foreach ($loyaltyRewardListDto->getLoyaltyRewards() as $loyaltyRewardDto) {
		$loyaltyRewardEntity = bindLoyaltyRewardDto($loyaltyRewardDto);
		$entityManager->persist($loyaltyRewardEntity);
		$entityManager->flush();
		array_push($loyaltyRewardsArray,bindLoyaltyRewardEntity($loyaltyRewardEntity));
	}
	$loyaltyRewardListDto = new LoyaltyRewardListDto();
	$loyaltyRewardListDto->setLoyaltyRewards($loyaltyRewardsArray);
	$loyaltyRewardListDto->printData($app);
});

$app->put('/loyaltyrewards/:id', function ($id) use ($app) {
	global $entityManager;
	$loyaltyRewardEntity = $entityManager->find("LoyaltyRewardEntity", $id);
	$entityManager->flush();
	$loyaltyRewardDto = bindLoyaltyRewardEntity($loyaltyRewardEntity);
	$loyaltyRewardDto->printData($app);
});

$app->delete('/loyaltyrewards/:id', function ($id) use ($app) {
	global $entityManager;
	$loyaltyRewardEntity = $entityManager->find("LoyaltyRewardEntity", $id);
	$entityManager->remove($loyaltyRewardEntity);
	$entityManager->flush();
});

/*Referances*/

?>