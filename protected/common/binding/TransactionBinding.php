<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'TransactionDto.php');

function bindTransactionDto($transactionDto)	{
	if ($transactionDto != null)	{
		$transactionEntity = new TransactionEntity();
        $transactionEntity->setTransactionId($transactionDto->getTransactionId());
        $transactionEntity->setTransactionTotal($transactionDto->getTransactionTotal());
        $transactionEntity->setUser($transactionDto->getUser());
        $transactionEntity->setTransactionType($transactionDto->getTransactionType());
        $transactionEntity->setTransactionProof($transactionDto->getTransactionProof());
        $transactionEntity->setTransactionDate($transactionDto->getTransactionDate());
        return $transactionEntity;
    }	else {
        return null;
    }
}

function bindTransactionEntity($transactionEntity)	{
	if ($transactionEntity != null)	{
		$transactionDto = new TransactionDto();
        $transactionDto->setTransactionId($transactionEntity->getTransactionId());
        $transactionDto->setTransactionTotal($transactionEntity->getTransactionTotal());
        $transactionDto->setUser(bindUserEntity($transactionEntity->getUser()));
        $transactionDto->setTransactionType($transactionEntity->getTransactionType());
        $transactionDto->setTransactionProof(bindTransactionProofEntity($transactionEntity->getTransactionProof()));
        $transactionDto->setTransactionDate($transactionEntity->getTransactionDate());
        return $transactionDto;
    }	else {
        return null;
    }
}

function bindTransactionEntityArray($transactionEntitys)   {
    $transactionDtos = new TransactionListDto();
    $transactionDtoArray = array();
    foreach ($transactionEntitys as $transactionEntity => $value) {
        array_push($transactionDtoArray, bindTransactionEntity($value));
    }
    $transactionDtos->setTransactions($transactionDtoArray);
    return $transactionDtos;
}

?>