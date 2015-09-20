<?php

/** @Entity @Table(name="PACS_PACKAGE") **/
class PackageEntity 	{

    /** @Id @Column(name="PACKAGE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $packageId;
    /** @Column(name="PACKAGE_NAME" , type="string" , length=20 , nullable=false) **/
    protected $packageName;
    /** @Column(name="PACKAGE_AMOUNT" , type="float" , length=10 , nullable=false) **/
    protected $packageAmount;
    /** @Column(name="PACKAGE_DESCR" , type="string" , length=100 , nullable=false) **/
    protected $packageDescr;
    /** @Column(name="EFF_FROM" , type="datetime" , nullable=false) **/
    protected $effFrom;
    /** @Column(name="EFF_TO" , type="datetime" , nullable=false) **/
    protected $effTo;

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
?>
