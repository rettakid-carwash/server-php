<?php

/** @Entity @Table(name="PACS_PACKAGE_SERVICE") **/
class PackageServiceEntity 	{

    /** @Id @Column(name="PACKAGE_SERVICE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $packageServiceId;
    /** @ManyToOne(targetEntity="PackageEntity" , fetch="LAZY") @JoinColumn(name="PACKAGE_ID", referencedColumnName="PACKAGE_ID") **/
    protected $package;
    /** @ManyToOne(targetEntity="ServiceEntity" , fetch="LAZY") @JoinColumn(name="SERVICE_ID", referencedColumnName="SERVICE_ID") **/
    protected $service;

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
?>
