<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TransactionServiceDto.php');

function bindTransactionServiceDto($transactionServiceDto)	{
	if ($transactionServiceDto != null)	{
	    global $entityManager;
		$transactionServiceEntity = new TransactionServiceEntity();
        $transactionServiceEntity->setTransactionServiceId($transactionServiceDto->getTransactionServiceId());
        $transactionServiceEntity->setTransaction($entityManager->find("TransactionEntity", $transactionServiceDto->getTransaction()->getTransactionId()));
        $transactionServiceEntity->setService($entityManager->find("ServiceEntity", $transactionServiceDto->getService()->getServiceId()));
        return $transactionServiceEntity;
    }	else {
        return null;
    }
}

function bindTransactionServiceEntity($transactionServiceEntity)	{
	if ($transactionServiceEntity != null)	{
		$transactionServiceDto = new TransactionServiceDto();
        $transactionServiceDto->setTransactionServiceId($transactionServiceEntity->getTransactionServiceId());
        $transactionServiceDto->setTransaction(bindTransactionEntity($transactionServiceEntity->getTransaction()));
        $transactionServiceDto->setService(bindServiceEntity($transactionServiceEntity->getService()));
        return $transactionServiceDto;
    }	else {
        return null;
    }
}

function bindTransactionServiceEntityArray($transactionServiceEntitys)   {
    $transactionServiceDtos = new TransactionServiceListDto();
    $transactionServiceDtoArray = array();
    foreach ($transactionServiceEntitys as $transactionServiceEntity => $value) {
        array_push($transactionServiceDtoArray, bindTransactionServiceEntity($value));
    }
    $transactionServiceDtos->setTransactionServices($transactionServiceDtoArray);
    return $transactionServiceDtos;
}

?>