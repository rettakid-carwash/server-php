<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDeviceDto.php');

function bindUserDeviceDto($userDeviceDto)	{
	if ($userDeviceDto != null)	{
	    global $entityManager;
		$userDeviceEntity = new UserDeviceEntity();
        $userDeviceEntity->setUserDevicesId($userDeviceDto->getUserDevicesId());
        $userDeviceEntity->setUser($entityManager->find("UserEntity", $userDeviceDto->getUser()->getUserId()));
        $userDeviceEntity->setDevicesType($entityManager->find("DevicesTypeEntity", $userDeviceDto->getDevicesType()->getDevicesTypeId()));
        $userDeviceEntity->setDeviceName($userDeviceDto->getDeviceName());
        $userDeviceEntity->setDeviceId($userDeviceDto->getDeviceId());
        return $userDeviceEntity;
    }	else {
        return null;
    }
}

function bindUserDeviceEntity($userDeviceEntity)	{
	if ($userDeviceEntity != null)	{
		$userDeviceDto = new UserDeviceDto();
        $userDeviceDto->setUserDevicesId($userDeviceEntity->getUserDevicesId());
        $userDeviceDto->setUser(bindUserEntity($userDeviceEntity->getUser()));
        $userDeviceDto->setDevicesType(bindDevicesTypeEntity($userDeviceEntity->getDevicesType()));
        $userDeviceDto->setDeviceName($userDeviceEntity->getDeviceName());
        $userDeviceDto->setDeviceId($userDeviceEntity->getDeviceId());
        return $userDeviceDto;
    }	else {
        return null;
    }
}

function bindUserDeviceEntityArray($userDeviceEntitys)   {
    $userDeviceDtos = new UserDeviceListDto();
    $userDeviceDtoArray = array();
    foreach ($userDeviceEntitys as $userDeviceEntity => $value) {
        array_push($userDeviceDtoArray, bindUserDeviceEntity($value));
    }
    $userDeviceDtos->setUserDevices($userDeviceDtoArray);
    return $userDeviceDtos;
}

?>