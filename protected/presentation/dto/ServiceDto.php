<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'IconDto.php');

class ServiceDto extends Dto 	{

    private $serviceId;
    private $serviceAmount;
    private $serviceLoyaltyPoints;
    private $serviceName;
    private $serviceDescr;
    private $icon;
    private $effFrom;
    private $effTo;

	public function __construct()	{
		$this->icon = new IconDto();
		$this->effFrom = new \DateTime("now");
		$this->effTo = new \DateTime("now");
	}

    public function getServiceId()	{
		return $this->serviceId;
	}

	public function setServiceId($serviceId)	{
		$this->serviceId = $serviceId;
	}

    public function getServiceAmount()	{
		return $this->serviceAmount;
	}

	public function setServiceAmount($serviceAmount)	{
		$this->serviceAmount = $serviceAmount;
	}

    public function getServiceLoyaltyPoints()	{
		return $this->serviceLoyaltyPoints;
	}

	public function setServiceLoyaltyPoints($serviceLoyaltyPoints)	{
		$this->serviceLoyaltyPoints = $serviceLoyaltyPoints;
	}

    public function getServiceName()	{
		return $this->serviceName;
	}

	public function setServiceName($serviceName)	{
		$this->serviceName = $serviceName;
	}

    public function getServiceDescr()	{
		return $this->serviceDescr;
	}

	public function setServiceDescr($serviceDescr)	{
		$this->serviceDescr = $serviceDescr;
	}

    public function getIcon()	{
		return $this->icon;
	}

	public function setIcon($icon)	{
		$this->icon = $icon;
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

class ServiceListDto extends Dto {

	private $services = array();

	public function getServices()	{
		return $this->services;
	}

	public function setServices($services)	{
		$this->services = $services;
	}

}
?>
