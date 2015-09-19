<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'SessionDto.php');

function bindSessionDto($sessionDto)	{
	if ($sessionDto != null)	{
	    global $entityManager;
		$sessionEntity = new SessionEntity();
        $sessionEntity->setSessionId($sessionDto->getSessionId());
        $sessionEntity->setUser($entityManager->find("UserEntity", $sessionDto->getUser()->getUserId()));
        $sessionEntity->setSessionLocation($sessionDto->getSessionLocation());
        $sessionEntity->setEffFrom($sessionDto->getEffFrom());
        $sessionEntity->setEffTo($sessionDto->getEffTo());
        return $sessionEntity;
    }	else {
        return null;
    }
}

function bindSessionEntity($sessionEntity)	{
	if ($sessionEntity != null)	{
		$sessionDto = new SessionDto();
        $sessionDto->setSessionId($sessionEntity->getSessionId());
        $sessionDto->setUser(bindUserEntity($sessionEntity->getUser()));
        $sessionDto->setSessionLocation($sessionEntity->getSessionLocation());
        $sessionDto->setEffFrom($sessionEntity->getEffFrom());
        $sessionDto->setEffTo($sessionEntity->getEffTo());
        return $sessionDto;
    }	else {
        return null;
    }
}

function bindSessionEntityArray($sessionEntitys)   {
    $sessionDtos = new SessionListDto();
    $sessionDtoArray = array();
    foreach ($sessionEntitys as $sessionEntity => $value) {
        array_push($sessionDtoArray, bindSessionEntity($value));
    }
    $sessionDtos->setSessions($sessionDtoArray);
    return $sessionDtos;
}

?>