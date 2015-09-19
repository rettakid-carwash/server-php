<?php

/** @Entity @Table(name="PACS_TRANSACTION_PROOF") **/
class TransactionProofEntity 	{

    /** @Id @Column(name="TRANSACTION_PROOF_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $transactionProofId;
    /** @Column(name="TRANSACTION_PROOF_URL" , type="string" , length=50 , nullable=false) **/
    protected $transactionProofUrl;
    /** @Column(name="TRANSACTION_PROOF_FILE" , type="string" , length=50 , nullable=false) **/
    protected $transactionProofFile;

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
?>
