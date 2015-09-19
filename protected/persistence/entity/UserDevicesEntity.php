<?php

/** @Entity @Table(name="PACS_USER_DEVICES") **/
class UserDevicesEntity 	{

    /** @Id @Column(name="USER_DEVICES_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $userDevicesId;
    /** @ManyToOne(targetEntity="UserEntity" , fetch="LAZY") @JoinColumn(name="DEVICE_USER_ID", referencedColumnName="USER_ID") **/
    protected $user;
    /** @ManyToOne(targetEntity="DevicesTypeEntity" , fetch="LAZY") @JoinColumn(name="DEVICE_TYPE_ID", referencedColumnName="DEVICES_TYPE_ID") **/
    protected $devicesType;
    /** @Column(name="DEVICE_NAME" , type="string" , length=50 , nullable=false) **/
    protected $deviceName;
    /** @Column(name="DEVICE_ID" , type="string" , length=50 , nullable=false) **/
    protected $deviceId;

    public function getUserDevicesId()	{
        return $this->userDevicesId;
	}

	public function setUserDevicesId($userDevicesId)	{
		$this->userDevicesId = $userDevicesId;
	}

    public function getUser()	{
        return $this->user;
	}

	public function setUser($user)	{
		$this->user = $user;
	}

    public function getDevicesType()	{
        return $this->devicesType;
	}

	public function setDevicesType($devicesType)	{
		$this->devicesType = $devicesType;
	}

    public function getDeviceName()	{
        return $this->deviceName;
	}

	public function setDeviceName($deviceName)	{
		$this->deviceName = $deviceName;
	}

    public function getDeviceId()	{
        return $this->deviceId;
	}

	public function setDeviceId($deviceId)	{
		$this->deviceId = $deviceId;
	}


}
?>
