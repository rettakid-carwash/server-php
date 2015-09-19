<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DataContentDto.php');

function bindDataContentDto($dataContentDto)	{
	if ($dataContentDto != null)	{
		$dataContentEntity = new DataContentEntity();
        $dataContentEntity->setDataContentId($dataContentDto->getDataContentId());
        $dataContentEntity->setDataContentData($dataContentDto->getDataContentData());
        return $dataContentEntity;
    }	else {
        return null;
    }
}

function bindDataContentEntity($dataContentEntity)	{
	if ($dataContentEntity != null)	{
		$dataContentDto = new DataContentDto();
        $dataContentDto->setDataContentId($dataContentEntity->getDataContentId());
        $dataContentDto->setDataContentData($dataContentEntity->getDataContentData());
        return $dataContentDto;
    }	else {
        return null;
    }
}

function bindDataContentEntityArray($dataContentEntitys)   {
    $dataContentDtos = new DataContentListDto();
    $dataContentDtoArray = array();
    foreach ($dataContentEntitys as $dataContentEntity => $value) {
        array_push($dataContentDtoArray, bindDataContentEntity($value));
    }
    $dataContentDtos->setDataContents($dataContentDtoArray);
    return $dataContentDtos;
}

?>