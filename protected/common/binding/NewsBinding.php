<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'NewsDto.php');

function bindNewsDto($newsDto)	{
	if ($newsDto != null)	{
	    global $entityManager;
		$newsEntity = new NewsEntity();
        $newsEntity->setNewsId($newsDto->getNewsId());
        $newsEntity->setNewsHeading($newsDto->getNewsHeading());
        $newsEntity->setDataContent($entityManager->find("DataContentEntity", $newsDto->getDataContent()->getDataContentId()));
        $newsEntity->setNewsDate($newsDto->getNewsDate());
        return $newsEntity;
    }	else {
        return null;
    }
}

function bindNewsEntity($newsEntity)	{
	if ($newsEntity != null)	{
		$newsDto = new NewsDto();
        $newsDto->setNewsId($newsEntity->getNewsId());
        $newsDto->setNewsHeading($newsEntity->getNewsHeading());
        $newsDto->setDataContent(bindDataContentEntity($newsEntity->getDataContent()));
        $newsDto->setNewsDate($newsEntity->getNewsDate());
        return $newsDto;
    }	else {
        return null;
    }
}

function bindNewsEntityArray($newsEntitys)   {
    $newsDtos = new NewsListDto();
    $newsDtoArray = array();
    foreach ($newsEntitys as $newsEntity => $value) {
        array_push($newsDtoArray, bindNewsEntity($value));
    }
    $newsDtos->setNewss($newsDtoArray);
    return $newsDtos;
}

?>