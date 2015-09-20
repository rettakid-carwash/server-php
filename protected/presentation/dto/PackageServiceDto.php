<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'PackageDto.php');
require_once ($PROJ_PRESENTATION_DTO_ROOT.'ServiceDto.php');

class PackageServiceDto extends Dto 	{

    private $packageServiceId;
    private $package;
    private $service;

	public function __construct()	{
		$this->package = new PackageDto();
		$this->service = new ServiceDto();
	}

    public function getPackageServiceId()	{
		return $this->packageServiceId;
	}

	public function setPackageServiceId($packageServiceId)	{
		$this->packageServiceId = $packageServiceId;
	}

    public function getPackage()	{
		return $this->package;
	}

	public function setPackage($package)	{
		$this->package = $package;
	}

    public function getService()	{
		return $this->service;
	}

	public function setService($service)	{
		$this->service = $service;
	}


}

class PackageServiceListDto extends Dto {

	private $packageServices = array();

	public function getPackageServices()	{
		return $this->packageServices;
	}

	public function setPackageServices($packageServices)	{
		$this->packageServices = $packageServices;
	}

}
?>
