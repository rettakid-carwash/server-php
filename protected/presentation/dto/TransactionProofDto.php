<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class TransactionProofDto extends Dto 	{

    private $transactionProofId;
    private $transactionProofUrl;
    private $transactionProofFile;

	public function __construct()	{
	}

    public function getTransactionProofId()	{
		return $this->transactionProofId;
	}

	public function setTransactionProofId($transactionProofId)	{
		$this->transactionProofId = $transactionProofId;
	}

    public function getTransactionProofUrl()	{
		return $this->transactionProofUrl;
	}

	public function setTransactionProofUrl($transactionProofUrl)	{
		$this->transactionProofUrl = $transactionProofUrl;
	}

    public function getTransactionProofFile()	{
		return $this->transactionProofFile;
	}

	public function setTransactionProofFile($transactionProofFile)	{
		$this->transactionProofFile = $transactionProofFile;
	}


}

class TransactionProofListDto extends Dto {

	private $transactionProofs = array();

	public function getTransactionProofs()	{
		return $this->transactionProofs;
	}

	public function setTransactionProofs($transactionProofs)	{
		$this->transactionProofs = $transactionProofs;
	}

}
?>
