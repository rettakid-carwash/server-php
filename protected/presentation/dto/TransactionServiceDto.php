<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'TransactionDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'ServiceDto.php');

class TransactionServiceDto extends Dto 	{

    private $transactionServiceId;
    private $transaction;
    private $service;

	public function __construct()	{
		$this->transaction = new TransactionDto();
		$this->service = new ServiceDto();
	}

    public function getTransactionServiceId()	{
		return $this->transactionServiceId;
	}

	public function setTransactionServiceId($transactionServiceId)	{
		$this->transactionServiceId = $transactionServiceId;
	}

    public function getTransaction()	{
		return $this->transaction;
	}

	public function setTransaction($transaction)	{
		$this->transaction = $transaction;
	}

    public function getService()	{
		return $this->service;
	}

	public function setService($service)	{
		$this->service = $service;
	}


}

class TransactionServiceListDto extends Dto {

	private $transactionServices = array();

	public function getTransactionServices()	{
		return $this->transactionServices;
	}

	public function setTransactionServices($transactionServices)	{
		$this->transactionServices = $transactionServices;
	}

}
?>
