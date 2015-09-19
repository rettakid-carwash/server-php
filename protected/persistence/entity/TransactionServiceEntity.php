<?php

/** @Entity @Table(name="pacs_transaction_service") **/
class TransactionServiceEntity 	{

    /** @Id @Column(name="TRANSACTION_SERVICE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $transactionServiceId;
    /** @ManyToOne(targetEntity="TransactionEntity" , fetch="LAZY") @JoinColumn(name="TRANSACTION_ID", referencedColumnName="TRANSACTION_ID") **/
    protected $transaction;
    /** @ManyToOne(targetEntity="ServiceEntity" , fetch="LAZY") @JoinColumn(name="SERVICE_ID", referencedColumnName="SERVICE_ID") **/
    protected $service;

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
?>
