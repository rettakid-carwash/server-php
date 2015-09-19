<?php

/** @Entity @Table(name="PACS_SERVICE") **/
class ServiceEntity 	{

    /** @Id @Column(name="SERVICE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $serviceId;
    /** @Column(name="SERVICE_AMOUNT" , type="float" , length=10 , nullable=false) **/
    protected $serviceAmount;
    /** @Column(name="SERVICE_LOYALTY_POINTS" , type="integer" , length=9 , nullable=false) **/
    protected $serviceLoyaltyPoints;
    /** @Column(name="SERVICE_NAME" , type="string" , length=10 , nullable=false) **/
    protected $serviceName;
    /** @Column(name="SERVICE_DESCR" , type="string" , length=100 , nullable=false) **/
    protected $serviceDescr;
    /** @ManyToOne(targetEntity="IconEntity" , fetch="LAZY") @JoinColumn(name="SERVICE_ICON", referencedColumnName="ICON_ID") **/
    protected $icon;
    /** @Column(name="EFF_FROM" , type="datetime" , nullable=false) **/
    protected $effFrom;
    /** @Column(name="EFF_TO" , type="datetime" , nullable=false) **/
    protected $effTo;

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
?>
