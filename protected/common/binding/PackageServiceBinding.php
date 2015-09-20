<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PackageServiceDto.php');

function bindPackageServiceDto($packageServiceDto)	{
	if ($packageServiceDto != null)	{
	    global $entityManager;
		$packageServiceEntity = new PackageServiceEntity();
        $packageServiceEntity->setPackageServiceId($packageServiceDto->getPackageServiceId());
        $packageServiceEntity->setPackage($entityManager->find("PackageEntity", $packageServiceDto->getPackage()->getPackageId()));
        $packageServiceEntity->setService($entityManager->find("ServiceEntity", $packageServiceDto->getService()->getServiceId()));
        return $packageServiceEntity;
    }	else {
        return null;
    }
}

function bindPackageServiceEntity($packageServiceEntity)	{
	if ($packageServiceEntity != null)	{
		$packageServiceDto = new PackageServiceDto();
        $packageServiceDto->setPackageServiceId($packageServiceEntity->getPackageServiceId());
        $packageServiceDto->setPackage(bindPackageEntity($packageServiceEntity->getPackage()));
        $packageServiceDto->setService(bindServiceEntity($packageServiceEntity->getService()));
        return $packageServiceDto;
    }	else {
        return null;
    }
}

function bindPackageServiceEntityArray($packageServiceEntitys)   {
    $packageServiceDtos = new PackageServiceListDto();
    $packageServiceDtoArray = array();
    foreach ($packageServiceEntitys as $packageServiceEntity => $value) {
        array_push($packageServiceDtoArray, bindPackageServiceEntity($value));
    }
    $packageServiceDtos->setPackageServices($packageServiceDtoArray);
    return $packageServiceDtos;
}

?>