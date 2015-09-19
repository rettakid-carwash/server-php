<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DevicesTypeDto.php');

function bindDevicesTypeDto($devicesTypeDto)	{
	if ($devicesTypeDto != null)	{
		$devicesTypeEntity = new DevicesTypeEntity();
        $devicesTypeEntity->setDevicesTypeId($devicesTypeDto->getDevicesTypeId());
        $devicesTypeEntity->setDeviceTypeName($devicesTypeDto->getDeviceTypeName());
        $devicesTypeEntity->setDeviceCanPush($devicesTypeDto->getDeviceCanPush());
        return $devicesTypeEntity;
    }	else {
        return null;
    }
}

function bindDevicesTypeEntity($devicesTypeEntity)	{
	if ($devicesTypeEntity != null)	{
		$devicesTypeDto = new DevicesTypeDto();
        $devicesTypeDto->setDevicesTypeId($devicesTypeEntity->getDevicesTypeId());
        $devicesTypeDto->setDeviceTypeName($devicesTypeEntity->getDeviceTypeName());
        $devicesTypeDto->setDeviceCanPush($devicesTypeEntity->getDeviceCanPush());
        return $devicesTypeDto;
    }	else {
        return null;
    }
}

function bindDevicesTypeEntityArray($devicesTypeEntitys)   {
    $devicesTypeDtos = new DevicesTypeListDto();
    $devicesTypeDtoArray = array();
    foreach ($devicesTypeEntitys as $devicesTypeEntity => $value) {
        array_push($devicesTypeDtoArray, bindDevicesTypeEntity($value));
    }
    $devicesTypeDtos->setDevicesTypes($devicesTypeDtoArray);
    return $devicesTypeDtos;
}

?>