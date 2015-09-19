<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'SessionServiceDto.php');

function bindSessionServiceDto($sessionServiceDto)	{
	if ($sessionServiceDto != null)	{
		$sessionServiceEntity = new SessionServiceEntity();
        $sessionServiceEntity->setSessionServiceId($sessionServiceDto->getSessionServiceId());
        $sessionServiceEntity->setSession($sessionServiceDto->getSession());
        $sessionServiceEntity->setService($sessionServiceDto->getService());
        return $sessionServiceEntity;
    }	else {
        return null;
    }
}

function bindSessionServiceEntity($sessionServiceEntity)	{
	if ($sessionServiceEntity != null)	{
		$sessionServiceDto = new SessionServiceDto();
        $sessionServiceDto->setSessionServiceId($sessionServiceEntity->getSessionServiceId());
        $sessionServiceDto->setSession(bindSessionEntity($sessionServiceEntity->getSession()));
        $sessionServiceDto->setService(bindServiceEntity($sessionServiceEntity->getService()));
        return $sessionServiceDto;
    }	else {
        return null;
    }
}

function bindSessionServiceEntityArray($sessionServiceEntitys)   {
    $sessionServiceDtos = new SessionServiceListDto();
    $sessionServiceDtoArray = array();
    foreach ($sessionServiceEntitys as $sessionServiceEntity => $value) {
        array_push($sessionServiceDtoArray, bindSessionServiceEntity($value));
    }
    $sessionServiceDtos->setSessionServices($sessionServiceDtoArray);
    return $sessionServiceDtos;
}

?>