<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'SessionDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'ServiceDto.php');

class SessionServiceDto extends Dto 	{

    private $sessionServiceId;
    private $session;
    private $service;

	public function __construct()	{
		$this->session = new SessionDto();
		$this->service = new ServiceDto();
	}

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

class SessionServiceListDto extends Dto {

	private $sessionServices = array();

	public function getSessionServices()	{
		return $this->sessionServices;
	}

	public function setSessionServices($sessionServices)	{
		$this->sessionServices = $sessionServices;
	}

}
?>
