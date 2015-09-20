<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PackageDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'PackageEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'PackageBinding.php');

$app->get('/packages', function () use ($app) {
	global $entityManager;
   	$packageEntities = $entityManager->getRepository("PackageEntity")->findBy(array());
    $packages = bindPackageEntityArray($packageEntities);
    $packages->printData($app);
});

$app->get('/packages/:id', function ($id) use ($app) {
	global $entityManager;
	$packageEntity = $entityManager->find("PackageEntity", $id);
	$packageDto = bindPackageEntity($packageEntity);
	$packageDto->printData($app);
});

$app->post('/packages', function () use ($app) {
	global $entityManager;
	$packageDto = new PackageDto();
	$packageDto = $packageDto->bindXml($app);
	$packageEntity = bindPackageDto($packageDto);
	$entityManager->persist($packageEntity);
	$entityManager->flush();
	$packageDto = bindPackageEntity($packageEntity);
	$packageDto->printData($app);
});

$app->post('/packages/list', function () use ($app) {
	global $entityManager;
	$packageListDto = new PackageListDto();
	$packageListDto = $packageListDto->bindXml($app);
	$packagesArray = array();
	foreach ($packageListDto->getPackages() as $packageDto) {
		$packageEntity = bindPackageDto($packageDto);
		$entityManager->persist($packageEntity);
		$entityManager->flush();
		array_push($packagesArray,$packageEntity);
	}
	$packageListDto = new PackageListDto();
	$packageListDto->setPackages($packagesArray);
	$packageListDto->printData($app);
});

$app->put('/packages/:id', function ($id) use ($app) {
	global $entityManager;
	$packageEntity = $entityManager->find("PackageEntity", $id);
	$entityManager->flush();
	$packageDto = bindPackageEntity($packageEntity);
	$packageDto->printData($app);
});

$app->delete('/packages/:id', function ($id) use ($app) {
	global $entityManager;
	$packageEntity = $entityManager->find("PackageEntity", $id);
	$entityManager->remove($packageEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/packages/:id/packageservices', function ($id) use ($app) {
	global $entityManager;
   	$packageServiceEntities = $entityManager->getRepository("PackageServiceEntity")->findBy(array('package'=>$id));
    $packageService = bindPackageServiceEntityArray($packageServiceEntities);
    $packageService->printData($app);
});

?>