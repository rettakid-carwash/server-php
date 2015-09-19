<?php

/** @Entity @Table(name="PACS_TRANSACTION") **/
class TransactionEntity 	{

    /** @Id @Column(name="TRANSACTION_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $transactionId;
    /** @Column(name="TRANSACTION_TOTAL" , type="float" , length=10 , nullable=false) **/
    protected $transactionTotal;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="TRANSACTION_USER_ID", referencedColumnName="USER_ID") **/
    protected $user;
    /** @Column(name="TRANSACTION_TYPE" , type="string" , length=50 , nullable=false) **/
    protected $transactionType;
    /** @ManyToOne(targetEntity="TransactionProofEntity" , fetch="LAZY") @JoinColumn(name="TRANSACTION_PROOF_ID", referencedColumnName="TRANSACTION_PROOF_ID") **/
    protected $transactionProof;
    /** @Column(name="TRANSACTION_DATE" , type="datetime" , nullable=false) **/
    protected $transactionDate;

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
?>
