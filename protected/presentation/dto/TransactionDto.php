<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'TransactionProofDto.php');

class TransactionDto extends Dto 	{

    private $transactionId;
    private $transactionTotal;
    private $user;
    private $transactionType;
    private $transactionProof;
    private $transactionDate;

	public function __construct()	{
		$this->user = new UserDto();
		$this->transactionProof = new TransactionProofDto();
		$this->transactionDate = new \DateTime("now");
	}

    public function getTransactionId()	{
		return $this->transactionId;
	}

	public function setTransactionId($transactionId)	{
		$this->transactionId = $transactionId;
	}

    public function getTransactionTotal()	{
		return $this->transactionTotal;
	}

	public function setTransactionTotal($transactionTotal)	{
		$this->transactionTotal = $transactionTotal;
	}

    public function getUser()	{
		return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}

    public function getTransactionType()	{
		return $this->transactionType;
	}

	public function setTransactionType($transactionType)	{
		$this->transactionType = $transactionType;
	}

    public function getTransactionProof()	{
		return $this->transactionProof;
	}

	public function setTransactionProof($transactionProof)	{
		$this->transactionProof = $transactionProof;
	}

    public function getTransactionDate()	{
		return $this->transactionDate;
	}

	public function setTransactionDate($transactionDate)	{
		$this->transactionDate = $transactionDate;
	}


}

class TransactionListDto extends Dto {

	private $transactions = array();

	public function getTransactions()	{
		return $this->transactions;
	}

	public function setTransactions($transactions)	{
		$this->transactions = $transactions;
	}

}
?>
