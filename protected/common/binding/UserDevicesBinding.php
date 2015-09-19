<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDevicesDto.php');

function bindUserDevicesDto($userDevicesDto)	{
	if ($userDevicesDto != null)	{
		$userDevicesEntity = new UserDevicesEntity();
        $userDevicesEntity->setUserDevicesId($userDevicesDto->getUserDevicesId());
        $userDevicesEntity->setUser($userDevicesDto->getUser());
        $userDevicesEntity->setDevicesType($userDevicesDto->getDevicesType());
        $userDevicesEntity->setDeviceName($userDevicesDto->getDeviceName());
        $userDevicesEntity->setDeviceId($userDevicesDto->getDeviceId());
        return $userDevicesEntity;
    }	else {
        return null;
    }
}

function bindUserDevicesEntity($userDevicesEntity)	{
	if ($userDevicesEntity != null)	{
		$userDevicesDto = new UserDevicesDto();
        $userDevicesDto->setUserDevicesId($userDevicesEntity->getUserDevicesId());
        $userDevicesDto->setUser(bindUserEntity($userDevicesEntity->getUser()));
        $userDevicesDto->setDevicesType(bindDevicesTypeEntity($userDevicesEntity->getDevicesType()));
        $userDevicesDto->setDeviceName($userDevicesEntity->getDeviceName());
        $userDevicesDto->setDeviceId($userDevicesEntity->getDeviceId());
        return $userDevicesDto;
    }	else {
        return null;
    }
}

function bindUserDevicesEntityArray($userDevicesEntitys)   {
    $userDevicesDtos = new UserDevicesListDto();
    $userDevicesDtoArray = array();
    foreach ($userDevicesEntitys as $userDevicesEntity => $value) {
        array_push($userDevicesDtoArray, bindUserDevicesEntity($value));
    }
    $userDevicesDtos->setUserDevicess($userDevicesDtoArray);
    return $userDevicesDtos;
}

?>