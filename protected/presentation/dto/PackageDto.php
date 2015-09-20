<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'Dto.php');

class PackageDto extends Dto 	{

    private $packageId;
    private $packageName;
    private $packageAmount;
    private $packageDescr;
    private $effFrom;
    private $effTo;

	public function __construct()	{
		$this->effFrom = new \DateTime("now");
		$this->effTo = new \DateTime("now");
	}

    public function getPackageId()	{
		return $this->packageId;
	}

	public function setPackageId($packageId)	{
		$this->packageId = $packageId;
	}

    public function getPackageName()	{
		return $this->packageName;
	}

	public function setPackageName($packageName)	{
		$this->packageName = $packageName;
	}

    public function getPackageAmount()	{
		return $this->packageAmount;
	}

	public function setPackageAmount($packageAmount)	{
		$this->packageAmount = $packageAmount;
	}

    public function getPackageDescr()	{
		return $this->packageDescr;
	}

	public function setPackageDescr($packageDescr)	{
		$this->packageDescr = $packageDescr;
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

class PackageListDto extends Dto {

	private $packages = array();

	public function getPackages()	{
		return $this->packages;
	}

	public function setPackages($packages)	{
		$this->packages = $packages;
	}

}
?>
