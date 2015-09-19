<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'ServiceDto.php');

function bindServiceDto($serviceDto)	{
	if ($serviceDto != null)	{
	    global $entityManager;
		$serviceEntity = new ServiceEntity();
        $serviceEntity->setServiceId($serviceDto->getServiceId());
        $serviceEntity->setServiceAmount($serviceDto->getServiceAmount());
        $serviceEntity->setServiceLoyaltyPoints($serviceDto->getServiceLoyaltyPoints());
        $serviceEntity->setServiceName($serviceDto->getServiceName());
        $serviceEntity->setServiceDescr($serviceDto->getServiceDescr());
        $serviceEntity->setIcon($entityManager->find("IconEntity", $serviceDto->getIcon()->getIconId()));
        $serviceEntity->setEffFrom($serviceDto->getEffFrom());
        $serviceEntity->setEffTo($serviceDto->getEffTo());
        return $serviceEntity;
    }	else {
        return null;
    }
}

function bindServiceEntity($serviceEntity)	{
	if ($serviceEntity != null)	{
		$serviceDto = new ServiceDto();
        $serviceDto->setServiceId($serviceEntity->getServiceId());
        $serviceDto->setServiceAmount($serviceEntity->getServiceAmount());
        $serviceDto->setServiceLoyaltyPoints($serviceEntity->getServiceLoyaltyPoints());
        $serviceDto->setServiceName($serviceEntity->getServiceName());
        $serviceDto->setServiceDescr($serviceEntity->getServiceDescr());
        $serviceDto->setIcon(bindIconEntity($serviceEntity->getIcon()));
        $serviceDto->setEffFrom($serviceEntity->getEffFrom());
        $serviceDto->setEffTo($serviceEntity->getEffTo());
        return $serviceDto;
    }	else {
        return null;
    }
}

function bindServiceEntityArray($serviceEntitys)   {
    $serviceDtos = new ServiceListDto();
    $serviceDtoArray = array();
    foreach ($serviceEntitys as $serviceEntity => $value) {
        array_push($serviceDtoArray, bindServiceEntity($value));
    }
    $serviceDtos->setServices($serviceDtoArray);
    return $serviceDtos;
}

?>