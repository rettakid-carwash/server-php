<?php

/** @Entity @Table(name="pacs_session") **/
class SessionEntity 	{

    /** @Id @Column(name="SESSION_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $sessionId;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="SESSION_USER_ID", referencedColumnName="USER_ID") **/
    protected $user;
    /** @Column(name="SESSION_LOCATION" , type="string" , length=50) **/
    protected $sessionLocation;
    /** @Column(name="EFF_FROM" , type="datetime" , nullable=false) **/
    protected $effFrom;
    /** @Column(name="EFF_TO" , type="datetime" , nullable=false) **/
    protected $effTo;

    public function getSessionId()	{
        return $this->sessionId;
	}

	public function setSessionId($sessionId)	{
		$this->sessionId = $sessionId;
	}

    public function getUser()	{
        return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}

    public function getSessionLocation()	{
        return $this->sessionLocation;
	}

	public function setSessionLocation($sessionLocation)	{
		$this->sessionLocation = $sessionLocation;
	}

    public function getEffFrom()	{
        return $this->effFrom;
	}

	public function setEffFrom($effFrom)	{
		$this->effFrom = $effFrom;
	}

    public function getEffTo()	{
        return $this->effTo;
	}

	public function setEffTo($effTo)	{
		$this->effTo = $effTo;
	}


}
?>
