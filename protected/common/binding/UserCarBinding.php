<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserCarDto.php');

function bindUserCarDto($userCarDto)	{
	if ($userCarDto != null)	{
	    global $entityManager;
		$userCarEntity = new UserCarEntity();
        $userCarEntity->setCarId($userCarDto->getCarId());
        $userCarEntity->setUser($entityManager->find("UserEntity", $userCarDto->getUser()->getUserId()));
        $userCarEntity->setCarName($userCarDto->getCarName());
        $userCarEntity->setCarNumPlate($userCarDto->getCarNumPlate());
        $userCarEntity->setCarMake($userCarDto->getCarMake());
        $userCarEntity->setCarModel($userCarDto->getCarModel());
        $userCarEntity->setCarYear($userCarDto->getCarYear());
        $userCarEntity->setCarColor($userCarDto->getCarColor());
        return $userCarEntity;
    }	else {
        return null;
    }
}

function bindUserCarEntity($userCarEntity)	{
	if ($userCarEntity != null)	{
		$userCarDto = new UserCarDto();
        $userCarDto->setCarId($userCarEntity->getCarId());
        $userCarDto->setUser(bindUserEntity($userCarEntity->getUser()));
        $userCarDto->setCarName($userCarEntity->getCarName());
        $userCarDto->setCarNumPlate($userCarEntity->getCarNumPlate());
        $userCarDto->setCarMake($userCarEntity->getCarMake());
        $userCarDto->setCarModel($userCarEntity->getCarModel());
        $userCarDto->setCarYear($userCarEntity->getCarYear());
        $userCarDto->setCarColor($userCarEntity->getCarColor());
        return $userCarDto;
    }	else {
        return null;
    }
}

function bindUserCarEntityArray($userCarEntitys)   {
    $userCarDtos = new UserCarListDto();
    $userCarDtoArray = array();
    foreach ($userCarEntitys as $userCarEntity => $value) {
        array_push($userCarDtoArray, bindUserCarEntity($value));
    }
    $userCarDtos->setUserCars($userCarDtoArray);
    return $userCarDtos;
}

?>