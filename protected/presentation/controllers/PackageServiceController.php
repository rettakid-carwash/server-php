<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PackageServiceDto.php');
require_once ($PROJ_PERSISTANCE_ENTITY_ROOT.'PackageServiceEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'PackageServiceBinding.php');

$app->get('/packageservices', function () use ($app) {
	global $entityManager;
   	$packageServiceEntities = $entityManager->getRepository("PackageServiceEntity")->findBy(array());
    $packageServices = bindPackageServiceEntityArray($packageServiceEntities);
    $packageServices->printData($app);
});

$app->get('/packageservices/:id', function ($id) use ($app) {
	global $entityManager;
	$packageServiceEntity = $entityManager->find("PackageServiceEntity", $id);
	$packageServiceDto = bindPackageServiceEntity($packageServiceEntity);
	$packageServiceDto->printData($app);
});

$app->post('/packageservices', function () use ($app) {
	global $entityManager;
	$packageServiceDto = new PackageServiceDto();
	$packageServiceDto = $packageServiceDto->bindXml($app);
	$packageServiceEntity = bindPackageServiceDto($packageServiceDto);
	$entityManager->persist($packageServiceEntity);
	$entityManager->flush();
	$packageServiceDto = bindPackageServiceEntity($packageServiceEntity);
	$packageServiceDto->printData($app);
});

$app->post('/packageservices/list', function () use ($app) {
	global $entityManager;
	$packageServiceListDto = new PackageServiceListDto();
	$packageServiceListDto = $packageServiceListDto->bindXml($app);
	$packageServicesArray = array();
	foreach ($packageServiceListDto->getPackageServices() as $packageServiceDto) {
		$packageServiceEntity = bindPackageServiceDto($packageServiceDto);
		$entityManager->persist($packageServiceEntity);
		$entityManager->flush();
		array_push($packageServicesArray,$packageServiceEntity);
	}
	$packageServiceListDto = new PackageServiceListDto();
	$packageServiceListDto->setPackageServices($packageServicesArray);
	$packageServiceListDto->printData($app);
});

$app->put('/packageservices/:id', function ($id) use ($app) {
	global $entityManager;
	$packageServiceEntity = $entityManager->find("PackageServiceEntity", $id);
	$entityManager->flush();
	$packageServiceDto = bindPackageServiceEntity($packageServiceEntity);
	$packageServiceDto->printData($app);
});

$app->delete('/packageservices/:id', function ($id) use ($app) {
	global $entityManager;
	$packageServiceEntity = $entityManager->find("PackageServiceEntity", $id);
	$entityManager->remove($packageServiceEntity);
	$entityManager->flush();
});

/*Referances*/

?>