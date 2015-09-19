<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');

class SessionDto extends Dto 	{

    private $sessionId;
    private $user;
    private $sessionLocation;
    private $effFrom;
    private $effTo;

	public function __construct()	{
		$this->user = new UserDto();
		$this->effFrom = new \DateTime("now");
		$this->effTo = new \DateTime("now");
	}

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

class SessionListDto extends Dto {

	private $sessions = array();

	public function getSessions()	{
		return $this->sessions;
	}

	public function setSessions($sessions)	{
		$this->sessions = $sessions;
	}

}
?>
