<?php

/** @Entity @Table(name="PACS_DEVICES_TYPE") **/
class DevicesTypeEntity 	{

    /** @Id @Column(name="DEVICES_TYPE_ID" , type="bigint" , length=15 , nullable=false) @GeneratedValue **/
    protected $devicesTypeId;
    /** @Column(name="DEVICE_TYPE_NAME" , type="string" , length=50 , nullable=false) **/
    protected $deviceTypeName;
    /** @Column(name="DEVICE_CAN_PUSH" , type="boolean" , nullable=false) **/
    protected $deviceCanPush;

    public function getDevicesTypeId()	{
        return $this->devicesTypeId;
	}

	public function setDevicesTypeId($devicesTypeId)	{
		$this->devicesTypeId = $devicesTypeId;
	}

    public function getDeviceTypeName()	{
        return $this->deviceTypeName;
	}

	public function setDeviceTypeName($deviceTypeName)	{
		$this->deviceTypeName = $deviceTypeName;
	}

    public function getDeviceCanPush()	{
        return ($this->deviceCanPush) ? 'true' : 'false';
	}

	public function setDeviceCanPush($deviceCanPush)	{
		$this->deviceCanPush = $deviceCanPush;
	}


}
?>
