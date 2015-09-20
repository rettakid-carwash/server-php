<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PackageDto.php');

function bindPackageDto($packageDto)	{
	if ($packageDto != null)	{
	    global $entityManager;
		$packageEntity = new PackageEntity();
        $packageEntity->setPackageId($packageDto->getPackageId());
        $packageEntity->setPackageName($packageDto->getPackageName());
        $packageEntity->setPackageAmount($packageDto->getPackageAmount());
        $packageEntity->setPackageDescr($packageDto->getPackageDescr());
        $packageEntity->setEffFrom($packageDto->getEffFrom());
        $packageEntity->setEffTo($packageDto->getEffTo());
        return $packageEntity;
    }	else {
        return null;
    }
}

function bindPackageEntity($packageEntity)	{
	if ($packageEntity != null)	{
		$packageDto = new PackageDto();
        $packageDto->setPackageId($packageEntity->getPackageId());
        $packageDto->setPackageName($packageEntity->getPackageName());
        $packageDto->setPackageAmount($packageEntity->getPackageAmount());
        $packageDto->setPackageDescr($packageEntity->getPackageDescr());
        $packageDto->setEffFrom($packageEntity->getEffFrom());
        $packageDto->setEffTo($packageEntity->getEffTo());
        return $packageDto;
    }	else {
        return null;
    }
}

function bindPackageEntityArray($packageEntitys)   {
    $packageDtos = new PackageListDto();
    $packageDtoArray = array();
    foreach ($packageEntitys as $packageEntity => $value) {
        array_push($packageDtoArray, bindPackageEntity($value));
    }
    $packageDtos->setPackages($packageDtoArray);
    return $packageDtos;
}

?>