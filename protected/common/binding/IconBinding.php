<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'IconDto.php');

function bindIconDto($iconDto)	{
	if ($iconDto != null)	{
	    global $entityManager;
		$iconEntity = new IconEntity();
        $iconEntity->setIconId($iconDto->getIconId());
        $iconEntity->setIconName($iconDto->getIconName());
        $iconEntity->setIconColor($iconDto->getIconColor());
        $iconEntity->setIconSize($iconDto->getIconSize());
        $iconEntity->setIconFileName($iconDto->getIconFileName());
        return $iconEntity;
    }	else {
        return null;
    }
}

function bindIconEntity($iconEntity)	{
	if ($iconEntity != null)	{
		$iconDto = new IconDto();
        $iconDto->setIconId($iconEntity->getIconId());
        $iconDto->setIconName($iconEntity->getIconName());
        $iconDto->setIconColor($iconEntity->getIconColor());
        $iconDto->setIconSize($iconEntity->getIconSize());
        $iconDto->setIconFileName($iconEntity->getIconFileName());
        return $iconDto;
    }	else {
        return null;
    }
}

function bindIconEntityArray($iconEntitys)   {
    $iconDtos = new IconListDto();
    $iconDtoArray = array();
    foreach ($iconEntitys as $iconEntity => $value) {
        array_push($iconDtoArray, bindIconEntity($value));
    }
    $iconDtos->setIcons($iconDtoArray);
    return $iconDtos;
}

?>