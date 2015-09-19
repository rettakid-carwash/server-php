<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TransactionProofDto.php');

function bindTransactionProofDto($transactionProofDto)	{
	if ($transactionProofDto != null)	{
		$transactionProofEntity = new TransactionProofEntity();
        $transactionProofEntity->setTransactionProofId($transactionProofDto->getTransactionProofId());
        $transactionProofEntity->setTransactionProofUrl($transactionProofDto->getTransactionProofUrl());
        $transactionProofEntity->setTransactionProofFile($transactionProofDto->getTransactionProofFile());
        return $transactionProofEntity;
    }	else {
        return null;
    }
}

function bindTransactionProofEntity($transactionProofEntity)	{
	if ($transactionProofEntity != null)	{
		$transactionProofDto = new TransactionProofDto();
        $transactionProofDto->setTransactionProofId($transactionProofEntity->getTransactionProofId());
        $transactionProofDto->setTransactionProofUrl($transactionProofEntity->getTransactionProofUrl());
        $transactionProofDto->setTransactionProofFile($transactionProofEntity->getTransactionProofFile());
        return $transactionProofDto;
    }	else {
        return null;
    }
}

function bindTransactionProofEntityArray($transactionProofEntitys)   {
    $transactionProofDtos = new TransactionProofListDto();
    $transactionProofDtoArray = array();
    foreach ($transactionProofEntitys as $transactionProofEntity => $value) {
        array_push($transactionProofDtoArray, bindTransactionProofEntity($value));
    }
    $transactionProofDtos->setTransactionProofs($transactionProofDtoArray);
    return $transactionProofDtos;
}

?>