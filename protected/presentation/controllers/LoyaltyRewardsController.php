<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'LoyaltyRewardsDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'LoyaltyRewardsEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'LoyaltyRewardsBinding.php');

$app->get('/loyaltyrewardss', function () use ($app) {
	global $entityManager;
   	$loyaltyRewardsEntities = $entityManager->getRepository("LoyaltyRewardsEntity")->findBy(array());
    $loyaltyRewardss = bindLoyaltyRewardsEntityArray($loyaltyRewardsEntities);
    $loyaltyRewardss->printData($app);
});

$app->get('/loyaltyrewardss/:id', function ($id) use ($app) {
	global $entityManager;
	$loyaltyRewardsEntity = new LoyaltyRewardsEntity();
	$loyaltyRewardsEntity = $entityManager->find("LoyaltyRewardsEntity", $id);
	$loyaltyRewardsDto = bindLoyaltyRewardsEntity($loyaltyRewardsEntity);
	$loyaltyRewardsDto->printData($app);
});

$app->post('/loyaltyrewardss/list', function () use ($app) {
	global $entityManager;
	$loyaltyRewardsListDto = new LoyaltyRewardsListDto();
	$loyaltyRewardsListDto = $loyaltyRewardsListDto->bindXml($app);
	foreach ($loyaltyRewardsListDto->getLoyaltyRewardss() as $loyaltyRewardsDto) {
		$loyaltyRewardsEntity = bindLoyaltyRewardsDto($loyaltyRewardsDto);
		$entityManager->persist($loyaltyRewardsEntity);
		$entityManager->flush();
	}
});

$app->put('/loyaltyrewardss/:id', function ($id) use ($app) {
	global $entityManager;
	$loyaltyRewardsEntity = $entityManager->find("LoyaltyRewardsEntity", $id);
	$entityManager->flush();
	$loyaltyRewardsDto = bindLoyaltyRewardsEntity($loyaltyRewardsEntity);
	$loyaltyRewardsDto->printData($app);
});

$app->post('/loyaltyrewardss', function () use ($app) {
	global $entityManager;
	$loyaltyRewardsDto = new LoyaltyRewardsDto();
	$loyaltyRewardsDto->bindJson($app);
	$entityManager->persist($loyaltyRewardsEntity);
	$entityManager->flush();
	$loyaltyRewardsDto = bindLoyaltyRewardsEntity($loyaltyRewardsEntity);
	$loyaltyRewardsDto->printData($app);
});

$app->delete('/loyaltyrewardss/:id', function ($id) use ($app) {
	global $entityManager;
	$loyaltyRewardsEntity = $entityManager->find("LoyaltyRewardsEntity", $id);
	$entityManager->remove($loyaltyRewardsEntity);
	$entityManager->flush();
});

/*Referances*/

?>