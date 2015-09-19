<?php

/** @Entity @Table(name="PACS_SESSION_SERVICE") **/
class SessionServiceEntity 	{

    /** @Id @Column(name="SESSION_SERVICE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $sessionServiceId;
    /** @ManyToOne(targetEntity="SessionEntity" , fetch="LAZY") @JoinColumn(name="SESSION_ID", referencedColumnName="SESSION_ID") **/
    protected $session;
    /** @ManyToOne(targetEntity="ServiceEntity" , fetch="LAZY") @JoinColumn(name="SERVICE_ID", referencedColumnName="SERVICE_ID") **/
    protected $service;

    public function getSessionServiceId()	{
        return $this->sessionServiceId;
	}

	public function setSessionServiceId($sessionServiceId)	{
		$this->sessionServiceId = $sessionServiceId;
	}

    public function getSession()	{
        return $this->session;
	}

	public function setSession($session)	{
		$this->session = $session;
	}

    public function getService()	{
        return $this->service;
	}

	public function setService($service)	{
		$this->service = $service;
	}


}
?>
